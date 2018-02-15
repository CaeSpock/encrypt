# encrypt
Encrypt is a small PHP based web page that will encrypt and decrypt a phrase with various shift cipher techniques.
You just need a web server with a PHP enabled environment.

# Installation
Download and install the files in a directory and directly access it to use the program.
If you want to change the configuration, please edit the conf.php file inside the “inc” directory.

# Documentation
From: https://en.wikipedia.org/wiki/Caesar_cipher

In cryptography, a Caesar cipher, also known as Caesar's cipher, the shift cipher, Caesar's code or Caesar shift, is one of the simplest and most widely known encryption techniques. It is a type of substitution cipher in which each letter in the plaintext is replaced by a letter some fixed number of positions down the alphabet. For example, with a left shift of 3, D would be replaced by A, E would become B, and so on. The method is named after Julius Caesar, who used it in his private correspondence.
The encryption step performed by a Caesar cipher is often incorporated as part of more complex schemes, such as the Vigenère cipher, and still has modern application in the ROT13 system. As with all single-alphabet substitution ciphers, the Caesar cipher is easily broken and in modern practice offers essentially no communication security.

**Caesar’s cipher 1**

Shifting the main alphabet a K number of positions to the right to find its equivalent, therefore we have with a K=23:
```
          Alphabet: ABCDEFGHIJKLMNOPQRSTUVWXYZ
      New alphabet: XYZABCDEFGHIJKLMNOPQRSTUVW
    Text to cipher: THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG
        New cipher: QEB NRFZH YOLTK CLU GRJMP LSBO QEB IXWV ALD
```
Deciphering is done in reverse.

**Caesar’s cipher 2**

In addition to the shifting made in Caesar’s cipher 1, every k characters you add a random character to confuse the possible readers

**ROT13**

From: https://en.wikipedia.org/wiki/ROT13

ROT13 ("rotate by 13 places", sometimes hyphenated ROT-13) is a simple letter substitution cipher that replaces a letter with the 13th letter after it, in the alphabet. ROT13 is a special case of the Caesar cipher, developed in ancient Rome.
Because there are 26 letters (2×13) in the basic Latin alphabet, ROT13 is its own inverse; that is, to undo ROT13, the same algorithm is applied, so the same action can be used for encoding and decoding. The algorithm provides virtually no cryptographic security, and is often cited as a canonical example of weak encryption.