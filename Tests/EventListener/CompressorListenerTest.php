<?php 

namespace Gaya\Bundle\HtmlCompressBundle\Helper;
use Gaya\Bundle\HtmlCompressBundle\Interfaces\CompressorInterface;

class Compressor implements CompressorInterface {

  protected $buffer;

  /**
   * Compress html output
   * @return string
   */
  public function compress() {
    
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
    $this->setBuffer(preg_replace($search, $replace, $this->getBuffer()));
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