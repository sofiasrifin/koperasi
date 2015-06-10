
function toUnicode(elmnt,content)
{
if (content.length==elmnt.maxLength)
	{
	next=elmnt.tabIndex
	if (next<document.forms[0].elements.length)
		{
		document.forms[0].elements[next].focus()
		}
	}
}

