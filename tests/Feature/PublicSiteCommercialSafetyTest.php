<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class PublicSiteCommercialSafetyTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $connection = (string) config('database.default');
        $database = (string) config("database.connections.{$connection}.database");

        if ($database !== 'akb_live_clone' || ! config('local_mirror.enabled')) {
            $this->markTestSkipped('Requires the isolated akb_live_clone database.');
        }
    }

    public function test_public_packages_keep_their_prices_and_features(): void
    {
        $packages = Product::query()
            ->with(['prices', 'features'])
            ->whereIn('name', ['Micro', 'Connect', 'Business', 'Enterprise'])
            ->orderBy('sequence')
            ->get()
            ->mapWithKeys(fn (Product $product): array => [
                $product->name => [
                    'id' => $product->id,
                    'active' => (int) $product->active,
                    'visible' => (int) $product->visible,
                    'is_package' => (bool) $product->is_package,
                    'prices' => $product->prices
                        ->mapWithKeys(fn ($price): array => [$price->interval => (int) $price->price])
                        ->all(),
                    'features' => $product->features
                        ->pluck('slug')
                        ->sort()
                        ->values()
                        ->all(),
                ],
            ])
            ->all();

        $this->assertSame([
            'Micro' => [
                'id' => 1,
                'active' => 1,
                'visible' => 1,
                'is_package' => true,
                'prices' => ['monthly' => 2900, 'annual' => 29000],
                'features' => ['image-alt-tags', 'leichte-sprache', 'max-url-100', 'scan-weekly', 'screen-reader', 'widget-support'],
            ],
            'Connect' => [
                'id' => 2,
                'active' => 1,
                'visible' => 1,
                'is_package' => true,
                'prices' => ['monthly' => 6900, 'annual' => 69000],
                'features' => ['barrierefreiheitserklaerung', 'image-alt-tags', 'leichte-sprache', 'max-url-500', 'scan-weekly', 'screen-reader', 'widget-support'],
            ],
            'Business' => [
                'id' => 3,
                'active' => 1,
                'visible' => 1,
                'is_package' => true,
                'prices' => ['monthly' => 15500, 'annual' => 159000],
                'features' => ['barrierefreiheitserklaerung', 'image-alt-tags', 'leichte-sprache', 'max-url-1500', 'scan-weekly', 'screen-reader', 'widget-support'],
            ],
            'Enterprise' => [
                'id' => 4,
                'active' => 1,
                'visible' => 1,
                'is_package' => true,
                'prices' => ['monthly' => 19500, 'annual' => 199000],
                'features' => ['barrierefreiheitserklaerung', 'image-alt-tags', 'leichte-sprache', 'max-url-15k', 'scan-weekly', 'screen-reader', 'widget-support'],
            ],
        ], $packages);
    }

    public function test_existing_single_products_keep_their_commercial_contract(): void
    {
        $products = Product::query()
            ->with(['prices', 'features'])
            ->whereIn('id', [24, 27, 30, 31])
            ->orderBy('id')
            ->get()
            ->mapWithKeys(fn (Product $product): array => [
                $product->id => [
                    'name' => $product->name,
                    'type' => $product->type,
                    'active' => (int) $product->active,
                    'visible' => (int) $product->visible,
                    'upgrade' => (bool) $product->upgrade,
                    'prices' => $product->prices
                        ->mapWithKeys(fn ($price): array => [$price->interval => (int) $price->price])
                        ->all(),
                    'features' => $product->features
                        ->pluck('slug')
                        ->sort()
                        ->values()
                        ->all(),
                ],
            ])
            ->all();

        $this->assertSame([
            24 => [
                'name' => 'altStar - Automatic Image alt-tags',
                'type' => 'product',
                'active' => 1,
                'visible' => 0,
                'upgrade' => true,
                'prices' => ['monthly' => 1999, 'annual' => 19900],
                'features' => ['image-alt-tags'],
            ],
            27 => [
                'name' => 'fixstern Core',
                'type' => 'product',
                'active' => 1,
                'visible' => 0,
                'upgrade' => false,
                'prices' => ['monthly' => 2900, 'annual' => 29000],
                'features' => ['max-url-10', 'scan-weekly', 'widget-support'],
            ],
            30 => [
                'name' => 'Barrierefreiheitserklärung',
                'type' => 'product',
                'active' => 1,
                'visible' => 0,
                'upgrade' => true,
                'prices' => ['monthly' => 599, 'annual' => 5990],
                'features' => ['barrierefreiheitserklaerung'],
            ],
            31 => [
                'name' => 'Sitescan 500, Upgrade Barrierefreiheitserklärung',
                'type' => 'upgrade',
                'active' => 1,
                'visible' => 0,
                'upgrade' => true,
                'prices' => ['monthly' => 999, 'annual' => 9900],
                'features' => ['inclucert', 'max-url-500', 'scan-weekly'],
            ],
        ], $products);
    }

    public function test_public_prices_and_direct_product_checkout_still_render(): void
    {
        $this->get('/preise')
            ->assertOk()
            ->assertSee('Micro')
            ->assertSee('Connect')
            ->assertSee('Business')
            ->assertSee('Enterprise');

        $this->getJson('/get-product-details?product_selection=30:monthly')
            ->assertOk()
            ->assertJsonPath('name', 'Barrierefreiheitserklärung')
            ->assertJsonPath('price_cents', 599)
            ->assertJsonPath('interval', 'monthly');

        $this->get('/upgrade/30?interval=monthly')
            ->assertOk()
            ->assertSee('Barrierefreiheitserklärung')
            ->assertSee('name="product_selection" value="30:monthly"', false);
    }
}
