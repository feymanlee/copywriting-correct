<p align="center">
copywriting-correct
</a>

<p align="center">中英文文案排版纠正器。</p>

> 项目地址 https://github.com/ricoa/copywriting-correct
演示地址 https://copywriting-correct.ricoo.top

# 描述
> 统一中文文案、排版的相关用法，降低团队成员之间的沟通成本，增强网站气质。
 
比较以下排版：
* 排版1
>LeanCloud数据存储是围绕AVObject进行的.每个AVObject都包含了与JSON兼容的key-value对应的数据。数据是schema-free的，你不需要在每个AVObject上提前指定存在哪些键，只要直接设定对应的key-value即可。
gitHub是一个通过git进行版本控制的软件源代码托管服务，由GitHub公司（曾称Logical Awesome）的开发者Chris Wanstrath、PJ Hyett和Tom Preston-Werner使用Ruby on Rails编写而成。

* 排版2
>LeanCloud 数据存储是围绕 AVObject 进行的。每个 AVObject 都包含了与 JSON 兼容的 key-value 对应的数据。数据是 schema-free 的，你不需要在每个 AVObject 上提前指定存在哪些键，只要直接设定对应的 key-value 即可。
 GitHub 是一个通过 Git 进行版本控制的软件源代码托管服务，由 GitHub 公司（曾称 Logical Awesome）的开发者 Chris Wanstrath、PJ Hyett 和 Tom Preston-Werner 使用 Ruby on Rails 编写而成。

很明显，第二种排版中英文有空格，标点符号也使用正确，专有名词使用正确，会让人看起来更舒服，也更专业。
本系统正是基于 [中文文案排版指北（简体中文版）](https://github.com/mzlogin/chinese-copywriting-guidelines) 进行纠正，帮助解决中英文混排的排版问题，提高文案可阅读性。

# 安装
```
//安装开发中版本
composer require ricoa/copywriting-correct:dev-master
```

# 使用
```php
<?php
require_once 'vendor/autoload.php';

use Ricoa\CopyWritingCorrect\CopyWritingCorrectService;

$service=new CopyWritingCorrectService();

$text=$service->correct('在LeanCloud上，数据存储是围绕AVObject进行的。');

```

# 注入自己的纠正器
继承 \Ricoa\CopyWritingCorrect\Correctors\Corrector，并实现 handle 方法。例如 ExampleCorrector.php
```php
<?php

class ExampleCorrector extends \Ricoa\CopyWritingCorrect\Correctors\Corrector {

    protected static $corrector=null;

    /**
     * @param string $text
     *
     * @return mixed
     */
    public function handle($text)
    {
        return $text;
    }
}
```
使用：
```php
<?php
require_once 'vendor/autoload.php';

use Ricoa\CopyWritingCorrect\CopyWritingCorrectService;

$service=new CopyWritingCorrectService();

$service->addCorrectors([ExampleCorrector::class]);//注入纠正器
$service->resetCorrectors([ExampleCorrector::class]);//重置纠正器，也即废弃默认的纠正器

$text=$service->correct('在LeanCloud上，数据存储是围绕AVObject进行的。');

```

# 已实现
## 空格
1. 中文字符与[半角字符](http://zh.wikipedia.org/wiki/%E5%85%A8%E5%BD%A2%E5%92%8C%E5%8D%8A%E5%BD%A2)（例如英文字符，数字，英文标点符号）间添加空格。
2. 数字后面跟着英文字符则在数字后添加空格（适用于数字+单位，例如 1 GB）。
3. 全角标点与其他字符之间不加空格
4. 希腊字母与中文字符以及数字和英文字符之间添加空格（不在指北内）。

## 标点符号
1. 不重复使用中文标点符号（仅！和？），重复时只保留第一个。

## 全角和半角
1. 中文以及中文标点符号（```）》```）后使用全角中文标点符号（包括！？。，（）：；）。
2. 数字使用半角字符。
3. 全角转半角（不在指北内）。
```php
[
	'０' , '１' , '２' , '３' , '４' ,
	'５' , '６' , '７' , '８' , '９' ,
	'Ａ' , 'Ｂ' , 'Ｃ' , 'Ｄ' , 'Ｅ' ,
	'Ｆ' , 'Ｇ' , 'Ｈ' , 'Ｉ' , 'Ｊ' ,
	'Ｋ' , 'Ｌ' , 'Ｍ' , 'Ｎ' , 'Ｏ' ,
	'Ｐ' , 'Ｑ' , 'Ｒ' , 'Ｓ' , 'Ｔ' ,
	'Ｕ' , 'Ｖ' , 'Ｗ' , 'Ｘ' , 'Ｙ' ,
	'Ｚ' , 'ａ' , 'ｂ' , 'ｃ' , 'ｄ' ,
	'ｅ' , 'ｆ' , 'ｇ' , 'ｈ' , 'ｉ' ,
	'ｊ' , 'ｋ' , 'ｌ' , 'ｍ' , 'ｎ' ,
	'ｏ' , 'ｐ' , 'ｑ' , 'ｒ' , 'ｓ' ,
	'ｔ' , 'ｕ' , 'ｖ' , 'ｗ' , 'ｘ' ,
	'ｙ' , 'ｚ' , '－' , '　' , '／' ,
	'％' , '＃' , '＠' , '＆' , '＜' ,
	'＞' , '［' , '］' , '｛' , '｝' ,
	'＼' , '｜' , '＋' , '＝' , '＿' ,
	'＾' , '￣' , '｀'
];
//转
[
	'0', '1', '2', '3', '4',
	'5', '6', '7', '8', '9',
	'A', 'B', 'C', 'D', 'E',
	'F', 'G', 'H', 'I', 'J',
	'K', 'L', 'M', 'N', 'O',
	'P', 'Q', 'R', 'S', 'T',
	'U', 'V', 'W', 'X', 'Y',
	'Z', 'a', 'b', 'c', 'd',
	'e', 'f', 'g', 'h', 'i',
	'j', 'k', 'l', 'm', 'n',
	'o', 'p', 'q', 'r', 's',
	't', 'u', 'v', 'w', 'x',
	'y', 'z', '-', ' ', '/',
	'%', '#', '@', '&', '<',
	'>', '[', ']', '{', '}',
	'\\','|', '+', '=', '_',
	'^', '~', '`'
];
```
## 名词
1. 专有名词使用正确的大小写（部分名词达成，见 [词典](https://github.com/NauxLiu/auto-correct/blob/afb60f8685a205adfe33ee342c98cc3e20d33c9e/dicts.php)）

# 未实现
## 全角和半角
1. 遇到完整的英文整句、特殊名词，其內容使用半角标点

# 改进
有什么新的想法和建议，欢迎提交 [issue](https://github.com/ricoa/copywriting-correct/issues) 或者 [Pull Requests](https://github.com/ricoa/copywriting-correct/pulls)。

# License
基于 [MIT license](http://opensource.org/licenses/MIT).