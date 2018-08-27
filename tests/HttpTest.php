<?php
declare(strict_types = 1);
namespace RHo\ABNF_Test;

use RHo\ABNF\HttpInterface as AbnfHttp;
use PHPUnit\Framework\TestCase;

class HttpTest extends TestCase
{

    public function testOptionalWhitespace()
    {
        $this->assertSame(1, preg_match('/^' . AbnfHttp::OWS . '$/', ""));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::OWS . '$/', " "));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::OWS . '$/', "\t"));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::OWS . '$/', "\t\t\t   \t"));
    }

    public function testRequiredWhitespace()
    {
        $this->assertSame(0, preg_match('/^' . AbnfHttp::RWS . '$/', ""));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::RWS . '$/', " "));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::RWS . '$/', "\t"));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::RWS . '$/', "\t\t\t   \t"));
    }

    public function testTChar()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '!'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '#'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '$'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '%'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '&'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', "'"));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '*'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '+'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '-'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '.'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '^'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '_'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '`'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '|'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '~'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '0'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', '9'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', 'a'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::tchar . ']$/', 'Z'));

        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '('));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', ')'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '<'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '>'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '@'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', ','));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', ';'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', ':'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '\\'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '"'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '/'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '['));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', ']'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '?'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '='));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '{'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::tchar . ']$/', '}'));
    }

    public function testSpecial()
    {
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '!'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '#'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '$'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '%'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '&'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', "'"));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '*'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '+'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '-'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '.'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '^'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '_'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '`'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '|'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '~'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '0'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', '9'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', 'a'));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::special . ']$/', 'Z'));

        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '('));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', ')'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '<'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '>'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '@'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', ','));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', ';'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', ':'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '\\'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '"'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '/'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '['));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', ']'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '?'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '='));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '{'));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::special . ']$/', '}'));
    }

    public function testToken()
    {
        $this->assertSame(1, preg_match('/^' . AbnfHttp::token . '$/', '!#$%&\'*+-.^_`|~0123456789abcdxyzABCZ'));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::token . '$/', ''));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::token . '$/', '/"()<>@,;:[]?={}'));
    }

    public function testObsText()
    {
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::obs_text . ']$/', chr(0x80)));
        $this->assertSame(1, preg_match('/^[' . AbnfHttp::obs_text . ']$/', chr(0xFF)));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::obs_text . ']$/', chr(0x7F)));
        $this->assertSame(0, preg_match('/^[' . AbnfHttp::obs_text . ']$/', chr(0x00)));
    }

    public function testQDText()
    {
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', ''));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', "\t"));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', '!'));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', '#'));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', '['));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', ']'));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', '~'));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', chr(0x80)));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::qdtext . '$/', chr(0xFF)));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::qdtext . '$/', '\\'));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::qdtext . '$/', '"'));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::qdtext . '$/', chr(0x7F)));
    }

    public function testQuotedPair()
    {
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_pair . '$/', "\\\t"));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_pair . '$/', "\\ "));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_pair . '$/', "\\A"));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_pair . '$/', "\\" . chr(0x80)));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::quoted_pair . '$/', "\\" . chr(0x7F)));
    }

    public function testQuotedString()
    {
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_string . '$/', '""'));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_string . '$/', '" "'));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_string . '$/', "\"\t\""));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_string . '$/', "\"\t    \t   \t\""));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_string . '$/', '"abc"'));
        $this->assertSame(1, preg_match('/^' . AbnfHttp::quoted_string . '$/', '"\a\b\c"'));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::quoted_string . '$/', '"' . chr(0x7F) . '"'));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::quoted_string . '$/', ' '));
        $this->assertSame(0, preg_match('/^' . AbnfHttp::quoted_string . '$/', "\t"));
    }
}