<?php
namespace RHo\ABNF;

// https://tools.ietf.org/html/rfc5234#appendix-B.1
interface CoreInterface
{

    // ALPHA = %x41-5A / %x61-7A ; Upper- and lower-case ASCII letters (A–Z, a–z)
    public const ALPHA = 'a-zA-Z';

    // DIGIT = %x30-39 ; Decimal digits (0–9)
    public const DIGIT = '0-9';

    // HEXDIG = DIGIT / "A" / "B" / "C" / "D" / "E" / "F" ; Hexadecimal digits (0–9, A–F)
    public const HEXDIG = self::DIGIT . 'ABCDEF';

    // DQUOTE = %x22 ; Double quote
    public const DQUOTE = '\"';

    // SP = %x20 ; Space
    public const SP = ' ';

    // HTAB = %x09 ; Horizontal tab
    public const HTAB = '\t';

    // WSP = SP / HTAB ; Space and horizontal tab
    public const WSP = self::SP . self::HTAB;

    // LWSP = *(WSP / CRLF WSP) ; Linear white space (past newline)
    public const LWSP = '(?:[' . self::WSP . ']|' . self::CRLF . '[' . self::WSP . '])*';

    // VCHAR = %x21-7E ; Visible (printing) characters
    public const VCHAR = '!-~';

    // CHAR = %x01-7F ; Any ASCII character, excluding NUL
    public const CHAR = '\x{01}-\x{7F}';

    // OCTET = %x00-FF ; 8 bits of data
    public const OCTET = '\x{00}-\x{FF}';

    // CTL = %x00-1F / %x7F ; Controls
    public const CTL = '\x{00}-\x{1F}\x{7F}';

    // CR = %x0D ; Carriage return
    public const CR = '\r';

    // LF = %x0A ; Linefeed
    public const LF = '\n';

    // CRLF = CR LF ; Internet-standard newline
    public const CRLF = self::CR . self::LF;

    // BIT = "0" / "1" ; Binary digit
    public const BIT = '01';
}