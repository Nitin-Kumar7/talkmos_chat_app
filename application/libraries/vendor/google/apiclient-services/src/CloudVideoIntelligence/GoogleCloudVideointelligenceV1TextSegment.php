<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1TextSegment extends \Google\Collection
{
  protected $collection_key = 'frames';
  /**
   * @var float
   */
  public $confidence;
  protected $framesType = GoogleCloudVideointelligenceV1TextFrame::class;
  protected $framesDataType = 'array';
  public $frames;
  protected $segmentType = GoogleCloudVideointelligenceV1VideoSegment::class;
  protected $segmentDataType = '';
  public $segment;

  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param GoogleCloudVideointelligenceV1TextFrame[]
   */
  public function setFrames($frames)
  {
    $this->frames = $frames;
  }
  /**
   * @return GoogleCloudVideointelligenceV1TextFrame[]
   */
  public function getFrames()
  {
    return $this->frames;
  }
  /**
   * @param GoogleCloudVideointelligenceV1VideoSegment
   */
  public function setSegment(GoogleCloudVideointelligenceV1VideoSegment $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return GoogleCloudVideointelligenceV1VideoSegment
   */
  public function getSegment()
  {
    return $this->segment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1TextSegment::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1TextSegment');
