<?php

/**
 * ChartIframeInformation form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class ChartIframeInformationForm extends BaseChartIframeInformationForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('chart_iframe_information');
  }
}
