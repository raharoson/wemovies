<?php

namespace App\Model;
class Movie{
    public function __construct(
        private int $id,
        private string $title,
        private string $overview,
        private string $releaseDate,
        private int $voteCount,
        private ?string $posterPath,
        private ?string $backdropPath
    ) {}

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of title
         */
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         */
        public function setTitle($title): self
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of backdropPath
         */
        public function getBackdropPath()
        {
                return $this->backdropPath;
        }

        /**
         * Set the value of backdropPath
         */
        public function setBackdropPath($backdropPath): self
        {
                $this->backdropPath = $backdropPath;

                return $this;
        }

        /**
         * Get the value of posterPath
         */
        public function getPosterPath()
        {
                return $this->posterPath;
        }

        /**
         * Set the value of posterPath
         */
        public function setPosterPath($posterPath): self
        {
                $this->posterPath = $posterPath;

                return $this;
        }

        /**
         * Get the value of overview
         */
        public function getOverview()
        {
                return $this->overview;
        }

        /**
         * Set the value of overview
         */
        public function setOverview($overview): self
        {
                $this->overview = $overview;

                return $this;
        }

        /**
         * Get the value of voteCount
         */
        public function getVoteCount()
        {
                return $this->voteCount;
        }

        /**
         * Set the value of voteCount
         */
        public function setVoteCount($voteCount): self
        {
                $this->voteCount = $voteCount;

                return $this;
        }

        /**
         * Get the value of releaseDate
         */
        public function getReleaseDate()
        {
                return $this->releaseDate;
        }

        /**
         * Set the value of releaseDate
         */
        public function setReleaseDate($releaseDate): self
        {
                $this->releaseDate = $releaseDate;

                return $this;
        }
}