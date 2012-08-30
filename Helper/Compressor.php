<?php 

namespace Gaya\Bundle\HtmlcompressorBundle\Helper;
use Gaya\Bundle\HtmlcompressorBundle\Interfaces\CompressorInterface;

class Compressor implements CompressorInterface {

  protected $buffer;

  /**
   * overwrite buffer with compressed string
   */
  public function compress(){
    $this->setBuffer($this->compress($this->getBuffer()));
  }

  /**
   * Render buffer string and return compressed string
   * @return string
   */
  public function render() {
    return $this->_compress($this->getBuffer());    
  }  
  /**
   * Compress html output
   * @return string
   */
  public function _compress($buffer) {
    
    $search = array(
        '/\>[^\S ]+/s', //strip whitespaces after tags, except space
        '/[^\S ]+\</s', //strip whitespaces before tags, except space
        '/(\s)+/s'  // shorten multiple whitespace sequences
        );
    
    $replace = array(
        '>',
        '<',
        '\\1'
        );
    return preg_replace($search, $replace, $buffer);

  }
  

  /**
   * return buffer string
   * @return string
   */
  public function getBuffer() {
    return $this->buffer;
  }

  /**
   * set buffer string
   * @param string $buffer
   */
  public function setBuffer($buffer) {
    $this->buffer = $buffer;
  }
 
}