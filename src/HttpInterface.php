<?php
namespace RHo\ABNF;

// https://tools.ietf.org/html/rfc7230#appendix-B
interface HttpInterface
{

    // OWS = *( SP / HTAB ) ; optional whitespace
    public const OWS = '[' . CoreInterface::SP . CoreInterface::HTAB . ']*';

    // RWS = 1*( SP / HTAB ) ; required whitespace
    public const RWS = '[' . CoreInterface::SP . CoreInterface::HTAB . ']+';

    // tchar = "!" / "#" / "$" / "%" / "&" / "'" / "*" / "+" / "-" / "." / "^" / "_" / "`" / "|" / "~" / DIGIT / ALPHA ; any VCHAR, except delimiters
    public const tchar = "!#$%&'*+\-.^_`|~" . CoreInterface::DIGIT . CoreInterface::ALPHA;

    // special = "(" / ")" / "<" / ">" / "@" / "," / ";" / ":" / "\" / DQUOTE / "/" / "[" / "]" / "?" / "=" / "{" / "}"
    public const special = "\/\x{5C}()<>@,;:\[\]?={}" . CoreInterface::DQUOTE;

    // attribute = token
    // type = token
    // subtype = token
    // token = 1*tchar
    public const token = '[' . self::tchar . ']+';

    // obs-text = %x80-FF
    public const obs_text = '\x{80}-\x{FF}';

    // qdtext = OWS / %x21 / %x23-5B / %x5D-7E / obs-text
    public const qdtext = '(?:' . self::OWS . '|[!#-\[\]-~' . self::obs_text . '])';

    // quoted-pair = "\" ( HTAB / SP / VCHAR / obs-text )
    public const quoted_pair = '(?:\\\[' . CoreInterface::HTAB . CoreInterface::SP . CoreInterface::VCHAR . self::obs_text . '])';

    // quoted-string = DQUOTE *( qdtext / quoted-pair ) DQUOTE
    public const quoted_string = CoreInterface::DQUOTE . '(?:' . self::qdtext . '*|' . self::quoted_pair . '*)' . CoreInterface::DQUOTE;
}