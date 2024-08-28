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

# Backup der Originaldatei erstellen
cp "$FILE_PATH" "$FILE_PATH.bak"

# Ersetzen von href- und src-Attributen unter Verwendung von GNU sed oder kompatibel
if sed --version 2>/dev/null | grep -q GNU; then
    # GNU sed
    sed -i.bak -E "/{{ URL::asset\(/!s/href=\"([^\"]+)\"/href=\"{{ URL::asset('\1') }}\"/g" "$FILE_PATH"
    sed -i.bak -E "/{{ URL::asset\(/!s/src=\"([^\"]+)\"/src=\"{{ URL::asset('\1') }}\"/g" "$FILE_PATH"
else
    # BSD sed
    sed -i.bak -E "/{{ URL::asset\(/!s/href=\"([^\"]+)\"/href=\"{{ URL::asset('\1') }}\"/g" "$FILE_PATH"
    sed -i.bak -E "/{{ URL::asset\(/!s/src=\"([^\"]+)\"/src=\"{{ URL::asset('\1') }}\"/g" "$FILE_PATH"
fi

echo "Ersetzung abgeschlossen. Überprüfen Sie $FILE_PATH und $FILE_PATH.bak."
