<?php 

namespace Gaya\Bundle\HtmlcompressorBundle\Interfaces;

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