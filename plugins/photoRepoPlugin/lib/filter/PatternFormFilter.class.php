<?php
class PatternFormFilter extends BasePatternFormFilter
{
  public function configure()
  {
    unset(
      $this['image_tail'],
      $this['lines_tail'],
      $this['columns_tail'],
      $this['image_dorsal_left'],
      $this['lines_dorsal_left'],
      $this['columns_dorsal_left'],
      $this['image_dorsal_right'],
      $this['lines_dorsal_right'],
      $this['columns_dorsal_right'],
      $this['created_at'],
      $this['updated_at']
    );
  }
}
