@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.querySelectorAll('[data-builder-block]').forEach(block => {
                    // Falls der Button bereits existiert, nichts tun
                    if (block.querySelector('.move-block-button')) {
                        return;
                    }

                    let blockId = block.getAttribute('data-builder-block');

                    // Erstelle einen neuen Button
                    let moveButton = document.createElement('button');
                    moveButton.className = "move-block-button filament-icon-button filament-icon-button-secondary";
                    moveButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"><path d="M5 9l7-7 7 7M5 15l7 7 7-7"></path></svg>';
                    moveButton.style.marginLeft = "5px";
                    moveButton.title = "Block verschieben";
                    moveButton.onclick = function () {
                        Livewire.emit('openMoveBlockModal', blockId);
                    };

                    // Füge den Button in die Kopfzeile ein
                    let actionsContainer = block.querySelector('.filament-builder-block-actions');
                    if (actionsContainer) {
                        actionsContainer.appendChild(moveButton);
                    }
                });
            }, 500);
        });
    </script>

@endpush
