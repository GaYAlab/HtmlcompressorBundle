<?php 

namespace Gaya\Bundle\HtmlcompressorBundle\EventListener;

use Gaya\Bundle\HtmlcompressorBundle\Helper\Compressor;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

use Gaya\Bundle\HtmlcompressorBundle\Interfaces\CompressorInterface;

/**
 * 
 */
class CompressorListener {

  protected $compressor;
  protected $enabled;
  
  /**
   * @param Gaya\Bundle\HtmlcompressorBundle\Interfaces\CompressorInterface
   */
  public function __construct(CompressorInterface $compressor, $enabled = true) {
    $this->compressor = $compressor;
    $this->enabled = (bool) $enabled;
  }
  
  /**
   * Hook
   * intercepts and compress response content
   * @param Symfony\Component\HttpKernel\Event\FilterResponseEvent
   */
  public function onKernelResponse(FilterResponseEvent $event)
  {
    //compress output only if option is enabled
    if($this->enabled) { 
      $response = $event->getResponse();      
      $this->getCompressor()->setBuffer($response->getContent());
      $response->setContent((string) $this->getCompressor()->render());      
    }
  }
  
  /**
   * Get the compressor instance
   * @return Gaya\Bundle\HtmlcompressorBundle\Interfaces\CompressorInterface
   */
  public function getCompressor() {
    return $this->compressor;
  }

  /**
   * Define the compressor instance
   * @param  Gaya\Bundle\HtmlcompressorBundle\Interfaces\CompressorInterface $compressor
   */
  public function setCompressor(CompressorInterface $compressor) {
    $this->compressor = $compressor;
  }  
  
}

?>