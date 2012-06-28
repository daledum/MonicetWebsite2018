<?php


class ObservationPhoto extends BaseObservationPhoto {
    public function __toString() {
        return $this->getFileName();
    }
} // ObservationPhoto
