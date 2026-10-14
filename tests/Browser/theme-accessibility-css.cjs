const assert = require('node:assert/strict');
const path = require('node:path');
const test = require('node:test');
const sass = require('sass');

const result = sass.compile(path.resolve(__dirname, '../../resources/scss/theme.scss'), {
  loadPaths: [path.resolve(__dirname, '../../node_modules')],
  quietDeps: true,
  silenceDeprecations: ['import', 'global-builtin', 'color-functions', 'if-function'],
});

const css = result.css;

test('dark mode keeps outline buttons and drop caps readable', () => {
  assert.match(
    css,
    /html\[data-bs-theme=dark\] main \.btn-outline-dark\s*\{[^}]*--bs-btn-color:\s*#fafafe;[^}]*--bs-btn-border-color:\s*#fafafe;/i,
  );
  assert.match(
    css,
    /html\[data-bs-theme=dark\] main \.dropcap::first-letter\s*\{[^}]*color:\s*#8a94ff;/i,
  );
});

test('inline content links have a persistent visible underline', () => {
  assert.match(
    css,
    /main p a:not\(\.btn\):not\(\.nav-link\),\s*main li a:not\(\.btn\):not\(\.nav-link\)\s*\{[^}]*text-decoration:\s*underline;[^}]*text-decoration-thickness:/i,
  );
});
