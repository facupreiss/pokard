<?php
class InicioCard
{
  public $cardId;
  public $imgSrc;
  public $imgAlt;
  public $spanId;
  public $spanText;

  public function __construct($cardId, $imgSrc, $imgAlt, $spanId, $spanText)
  {
    $this->cardId = $cardId;
    $this->imgSrc = $imgSrc;
    $this->imgAlt = $imgAlt;
    $this->spanId = $spanId;
    $this->spanText = $spanText;
  }

  public function display()
  {
    echo '<div class="inicioCard" id="' . $this->cardId . '">';
    echo '<img src="' . $this->imgSrc . '" alt="' . $this->imgAlt . '" />';
    echo '<span id="' .
      $this->spanId .
      '" class="d-block text-center mt-2">' .
      $this->spanText .
      "</span>";
    echo '<div id="' . $this->spanId . 'Circle" class="circle"></div>';
    echo "</div>";
  }
}
