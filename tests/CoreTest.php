<?php
declare(strict_types = 1);
namespace RHo\ABNF_Test;

use RHo\ABNF\CoreInterface as AbnfCore;
use PHPUnit\Framework\TestCase;

class CoreTest extends TestCase
{

    public function testAlpha()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::ALPHA . ']$/', 'A'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::ALPHA . ']$/', 'Z'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::ALPHA . ']$/', 'a'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::ALPHA . ']$/', 'z'));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::ALPHA . ']$/', '!'));
    }

    public function testDigit()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::DIGIT . ']$/', '0'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::DIGIT . ']$/', '9'));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::DIGIT . ']$/', '?'));
    }

    public function testHexDigit()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::HEXDIG . ']$/', '0'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::HEXDIG . ']$/', '9'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::HEXDIG . ']$/', 'A'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::HEXDIG . ']$/', 'F'));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::HEXDIG . ']$/', 'G'));
    }

    public function testDoubleQuote()
    {
        $this->assertSame(1, preg_match('/^' . AbnfCore::DQUOTE . '$/', '"'));
        $this->assertSame(0, preg_match('/^' . AbnfCore::DQUOTE . '$/', "'"));
    }

    public function testSpace()
    {
        $this->assertSame(1, preg_match('/^' . AbnfCore::SP . '$/', ' '));
        $this->assertSame(0, preg_match('/^' . AbnfCore::SP . '$/', "\t"));
    }

    public function testHorizontalTab()
    {
        $this->assertSame(1, preg_match('/^' . AbnfCore::HTAB . '$/', "\t"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::HTAB . '$/', "\n"));
    }

    public function testWhitespace()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::WSP . ']$/', "\t"));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::WSP . ']$/', " "));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::WSP . ']$/', "\n"));
    }

    public function testVisibleChar()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::VCHAR . ']$/', '!'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::VCHAR . ']$/', '~'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::VCHAR . ']$/', 'a'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::VCHAR . ']$/', 'Z'));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::VCHAR . ']$/', "\n"));
    }

    public function testChar()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::CHAR . ']$/', chr(1)));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::CHAR . ']$/', chr(0x7F)));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::CHAR . ']$/', 'A'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::CHAR . ']$/', 'z'));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::CHAR . ']$/', chr(0x80)));
    }

    public function testOctet()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::OCTET . ']$/', chr(0)));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::OCTET . ']$/', chr(0xFF)));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::OCTET . ']$/', '!'));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::OCTET . ']$/', '"'));
    }

    public function testControls()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::CTL . ']$/', chr(0)));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::CTL . ']$/', chr(0x1F)));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::CTL . ']$/', chr(0x7F)));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::CTL . ']$/', chr(0x20)));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::CTL . ']$/', chr(0x80)));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::CTL . ']$/', chr(0xFF)));
    }

    public function testCarriageReturn()
    {
        $this->assertSame(1, preg_match('/^' . AbnfCore::CR . '$/', "\r"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::CR . '$/', "\n"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::CR . '$/', "\t"));
    }

    public function testLinefeed()
    {
        $this->assertSame(1, preg_match('/^' . AbnfCore::LF . '$/', "\n"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::LF . '$/', "\r"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::LF . '$/', "\t"));
    }

    public function testCrLf()
    {
        $this->assertSame(1, preg_match('/^' . AbnfCore::CRLF . '$/', "\r\n"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::CRLF . '$/', "\r"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::CRLF . '$/', "\n"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::CRLF . '$/', "\n\r"));
    }

    public function testBit()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfCore::BIT . ']$/', "1"));
        $this->assertSame(1, preg_match('/^[' . AbnfCore::BIT . ']$/', "0"));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::BIT . ']$/', "2"));
        $this->assertSame(0, preg_match('/^[' . AbnfCore::BIT . ']$/', "3"));
    }

    public function testLinearWhiteSpace()
    {
        $this->assertSame(1, preg_match('/^' . AbnfCore::LWSP . '$/', ''));
        $this->assertSame(1, preg_match('/^' . AbnfCore::LWSP . '$/', " "));
        $this->assertSame(1, preg_match('/^' . AbnfCore::LWSP . '$/', "\t"));
        $this->assertSame(1, preg_match('/^' . AbnfCore::LWSP . '$/', "\r\n\t"));
        $this->assertSame(1, preg_match('/^' . AbnfCore::LWSP . '$/', "\r\n "));
        $this->assertSame(0, preg_match('/^' . AbnfCore::LWSP . '$/', "\r\n"));
        $this->assertSame(0, preg_match('/^' . AbnfCore::LWSP . '$/', "\n\r"));
        $this->assertSame(1, preg_match('/^' . AbnfCore::LWSP . '$/', "\r\n\t\r\n \t\t \r\n\t"));
        $this->assertSame(1, preg_match('/^' . AbnfCore::LWSP . '$/', "\t\t\t     \r\n "));
    }
}