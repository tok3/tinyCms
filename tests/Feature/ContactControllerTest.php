<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    public function test_contact_form_accepts_normal_email_address(): void
    {
        config([
            'mail.from.address' => 'security@example.org',
            'mail.from.name' => 'Security Mailer',
        ]);

        $message = null;

        Mail::shouldReceive('raw')
            ->once()
            ->withArgs(function (string $body, callable $callback) use (&$message): bool {
                $message = new ContactMailMessageSpy();
                $callback($message);

                return str_contains($body, 'Name: Max Mustermann')
                    && str_contains($body, 'E-Mail: max@example.org')
                    && str_contains($body, 'Bitte um Rueckruf.');
            });

        $response = $this->from('/contact')->post('/contact/send', [
            'name' => 'Max Mustermann',
            'email' => 'max@example.org',
            'message' => 'Bitte um Rueckruf.',
            'terms' => '1',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success', 1);
        $response->assertSessionHasNoErrors();

        $this->assertSame('security@example.org', $message->fromAddress);
        $this->assertSame('Security Mailer', $message->fromName);
        $this->assertSame('max@example.org', $message->replyToAddress);
        $this->assertSame('Max Mustermann', $message->replyToName);
    }

    public function test_contact_form_rejects_email_header_injection_attempts(): void
    {
        Mail::shouldReceive('raw')->never();

        $response = $this->from('/contact')->post('/contact/send', [
            'name' => 'Max Mustermann',
            'email' => "max@example.org\r\nBcc: attacker@example.org",
            'message' => 'Bitte um Rueckruf.',
            'terms' => '1',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHasErrors('email');
    }

    public function test_contact_form_rejects_name_header_injection_attempts(): void
    {
        Mail::shouldReceive('raw')->never();

        $response = $this->from('/contact')->post('/contact/send', [
            'name' => "Max\r\nBcc: attacker@example.org",
            'email' => 'max@example.org',
            'message' => 'Bitte um Rueckruf.',
            'terms' => '1',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHasErrors('name');
    }
}

class ContactMailMessageSpy
{
    public ?string $fromAddress = null;

    public ?string $fromName = null;

    public ?string $replyToAddress = null;

    public ?string $replyToName = null;

    public function to(string $address): self
    {
        return $this;
    }

    public function from(string $address, ?string $name = null): self
    {
        $this->fromAddress = $address;
        $this->fromName = $name;

        return $this;
    }

    public function replyTo(string $address, ?string $name = null): self
    {
        $this->replyToAddress = $address;
        $this->replyToName = $name;

        return $this;
    }

    public function subject(string $subject): self
    {
        return $this;
    }
}
