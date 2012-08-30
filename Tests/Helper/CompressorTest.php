<?php 

namespace Gaya\Bundle\HtmlCompressorBundle\Tests\Helper;
use Gaya\Bundle\HtmlCompressorBundle\Helper\Compressor;

class CompressorTest extends \PHPUnit_Framework_TestCase {

  protected $compressor;
  
  public function setUp()
  {
      $this->compressor = new Compressor();
  }  

  
  /**
   * Test html output
   * @return string
   */
  public function testCompress() {
    
    $buffer = '<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="/web/bundles/acmedemo/css/demo.css" type="text/css" media="all" />
        <title>Symfony - Demos</title>
        <link rel="shortcut icon" href="/web/favicon.ico" />
    </head>
    <body>
        <div id="symfony-wrapper">
            <div id="symfony-header">
                <a href="/web/app_dev.php/">
                    <img src="/web/bundles/acmedemo/images/logo.gif" alt="Symfony">
                </a>
                <form id="symfony-search" method="GET" action="http://symfony.com/search">
                    <label for="symfony-search-field"><span>Search on Symfony Website</span></label>
                    <input name="q" id="symfony-search-field" type="search" placeholder="Search on Symfony website" class="medium_txt">
                    <input type="submit" class="symfony-button-grey" value="OK" />
                </form>
            </div>

            
            
            <div class="symfony-content">
                    <h1>Available demos</h1>
    <ul id="demo-list">
        <li><a href="/web/app_dev.php/demo/hello/World">Hello World</a></li>
        <li><a href="/web/app_dev.php/demo/secured/hello/World">Access the secured area</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/web/app_dev.php/demo/secured/login">Go to the login page</a></li>
            </ul>
            </div>

                    </div>
    
</body>
</html>'; 
    $expected = '<!DOCTYPE html><html> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <link rel="stylesheet" href="/web/bundles/acmedemo/css/demo.css" type="text/css" media="all" /> <title>Symfony - Demos</title> <link rel="shortcut icon" href="/web/favicon.ico" /> </head> <body> <div id="symfony-wrapper"> <div id="symfony-header"> <a href="/web/app_dev.php/"> <img src="/web/bundles/acmedemo/images/logo.gif" alt="Symfony"> </a> <form id="symfony-search" method="GET" action="http://symfony.com/search"> <label for="symfony-search-field"><span>Search on Symfony Website</span></label> <input name="q" id="symfony-search-field" type="search" placeholder="Search on Symfony website" class="medium_txt"> <input type="submit" class="symfony-button-grey" value="OK" /> </form> </div> <div class="symfony-content"> <h1>Available demos</h1> <ul id="demo-list"> <li><a href="/web/app_dev.php/demo/hello/World">Hello World</a></li> <li><a href="/web/app_dev.php/demo/secured/hello/World">Access the secured area</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/web/app_dev.php/demo/secured/login">Go to the login page</a></li> </ul> </div> </div> </body></html>';
    
    $this->compressor->setBuffer($buffer);        
    $this->assertEquals($this->compressor->render(), $expected );
  }
  
  
  public function render() {
    $this->compress();    
    return $this->getBuffer();
  }
  /**
   * 
   * @return string
   */
  public function getBuffer() {
    return $this->buffer;
  }

  /**
   * 
   * @param string $buffer
   */
  public function setBuffer($buffer) {
    $this->buffer = $buffer;
  }
 
}