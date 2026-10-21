<x-inclucert-presentation
    :mode="$data['mode'] ?? 'teaser'"
    :heading="$data['heading'] ?? 'IncluCert'"
    :body="$data['body'] ?? ''"
    :badge-ulid="$data['badge_ulid'] ?? null"
    :badge-appearance="$data['badge_appearance'] ?? 'compact'"
    :badge-theme="$data['badge_theme'] ?? 'auto'"
    :badge-theme-cycle="$data['badge_theme_cycle'] ?? false"
    :button-text="$data['button_text'] ?? null"
    :button-url="$data['button_url'] ?? null"
/>
