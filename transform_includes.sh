#!/bin/bash

FILE_PATH="$1"

if [[ -z "$FILE_PATH" ]]; then
  echo "Bitte geben Sie den Pfad zur Datei an."
  exit 1
fi

if [[ ! -f "$FILE_PATH" ]]; then
  echo "Die angegebene Datei existiert nicht: $FILE_PATH"
  exit 1
fi

# Erstellen eines Backups der Originaldatei
cp "$FILE_PATH" "$FILE_PATH.bak"

# Umwandeln von @@include-Anweisungen in Blade-Komponenten-Tags
sed -i '' -E "s|@@include\('\./([^']+)\.html'\)|<x-\1 />|g" "$FILE_PATH"

# Ersetzen von Slashes durch Punkte in den Blade-Komponenten-Tags
sed -i '' -E "s|<x-([^/]+)/([^/]+)/([^/>]+) />|<x-\1.\2.\3 />|g" "$FILE_PATH"
sed -i '' -E "s|<x-([^/]+)/([^/>]+) />|<x-\1.\2 />|g" "$FILE_PATH"

# Spezielle Behandlung für @@include-Anweisungen mit zusätzlichen Parametern
sed -i '' -E "s|@@include\('\./([^']+)\.html',\{\"page\": \"([^\"]+)\"\}\)|<x-\1 page='\2' />|g" "$FILE_PATH"

# Ersetzen von Slashes durch Punkte in den Blade-Komponenten-Tags mit Parametern
sed -i '' -E "s|<x-([^/]+)/([^/]+)/([^ ]+) page='([^']+)' />|<x-\1.\2.\3 page='\4' />|g" "$FILE_PATH"
sed -i '' -E "s|<x-([^/]+)/([^ ]+) page='([^']+)' />|<x-\1.\2 page='\3' />|g" "$FILE_PATH"

echo "Transformation abgeschlossen. Überprüfen Sie $FILE_PATH und $FILE_PATH.bak."
