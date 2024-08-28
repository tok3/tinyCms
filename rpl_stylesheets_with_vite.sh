#!/bin/bash

# Pfad zum Verzeichnis mit den .blade.php Dateien
DIRECTORY="/resources/views/layoutes/theme"

# Durchsuchen Sie alle .blade.php Dateien im Verzeichnis
find "$DIRECTORY" -type f -name "*.blade.php" -print0 | while IFS= read -r -d $'\0' file; do
    # Ersetzen Sie den spezifischen <link> Tag durch @vite in jeder Datei
    sed -i '' "s|<link href=\"{{ URL::asset('assets/css/theme.min.css') }}\" rel=\"stylesheet\">|@vite(['resources/scss/theme.scss'])|g" "$file"
done

echo "Ersetzung abgeschlossen."
