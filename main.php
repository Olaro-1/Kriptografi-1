<?php
// Fungsi untuk mengenkripsi teks menggunakan Vigenere Cipher
function vigenereEncrypt($text, $key) {
    $result = '';
    $text = strtoupper($text);
    $key = strtoupper($key);
    $keyLength = strlen($key);

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (ctype_alpha($char)) {
            $keyChar = $key[$i % $keyLength];
            $keyOffset = ord($keyChar) - 65;
            $char = chr(((ord($char) - 65 + $keyOffset) % 26) + 65);
        }
        $result .= $char;
    }

    return $result;
}

// Fungsi untuk mendekripsi teks menggunakan Vigenere Cipher
function vigenereDecrypt($text, $key) {
    $result = '';
    $text = strtoupper($text);
    $key = strtoupper($key);
    $keyLength = strlen($key);

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (ctype_alpha($char)) {
            $keyChar = $key[$i % $keyLength];
            $keyOffset = ord($keyChar) - 65;
            $char = chr(((ord($char) - 65 - $keyOffset + 26) % 26) + 65);
        }
        $result .= $char;
    }

    return $result;
}

// Contoh penggunaan
$plaintext = "password123"; // Teks yang ingin dienkripsi
$key = "SECRETKEY"; // Kunci enkripsi

$encryptedText = vigenereEncrypt($plaintext, $key);
echo "Teks Terenkripsi: $encryptedText<br>";

$decryptedText = vigenereDecrypt($encryptedText, $key);
echo "Teks Terdekripsi: $decryptedText<br>";
?>
