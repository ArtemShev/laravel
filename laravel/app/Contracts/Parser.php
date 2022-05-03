<?php
declare(strict_types=1);

namespace App\Contracts;

interface Parser
{
	/**
	 * @param string $url
	 * @return self
	 */
	public function setUrl(string $url): self;

	/**
	 * @return array
	 */
	public function saveNews();
}
