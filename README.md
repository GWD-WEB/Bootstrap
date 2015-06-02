# Bootstrap
Twitter's Bootstrap styles and Javascript with CakePHP 3.0

# Bootstrap plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require your-name-here/Bootstrap
```

## Usage

1) button($text, $link, $options)

    - $text = Text to display on button
    
    - $link = CakePHP's URL array or string
    
    - $options:
    
	type: btn color class, without the prefix btn- E.g. success|danger|info
	
	tooltip: text to display as Bootstrap's Tooltip
	
	glyphicon: glyphicon icon withou the prefix glyphicon- E.g. edit|eye-open|trash
	
	class: additional classes
```
$this->Bs->button("My link", '/', ['type'=>'primary', 'tooltip'=>'Click here to see it!', 'glyphicon'=>'eye-open', 'class'=>'btn-xs']);
```
2) glyph($glyph, $class = '')

    - $glyph = glyphicon icon withou the prefix glyphicon- E.g. edit|eye-open|trash
    
    - $class(optional) = additional classes

```
$this->Bs->glyph('download', 'green-color');
```
will output:

<span class="glyphicon glyphicon-dowload green-color"></span>

3) glyphCell($value)

Before using glyphCell, you have to configure it using setGlyphCellConfigs($values, $class = ''). setGlyphCellConfigs receives an key-value array, that key is data value(eg. boolean) and value is the glyphicon to use, and a key=>class array to be appended to Glyphicon.

setGlyphCellConfigs([0=>'cancel', 1=>'ok'], $class = [0=>'red-color-class', 1=>'green-color-class']);

then, calling glyphCell(1) will return: <span class="glyphicon glyphicon-ok green-color-class"></span>
