<?php 

namespace Gaya\Bundle\HtmlCompressBundle\Interfaces;

interface CompressorInterface {

  /**
   * render html output
   * @return string
   */
  public function render();
  
  /**
   * @param string $buffer
   */
  public function setBuffer($buffer);
  
}