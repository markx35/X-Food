<?php
namespace Ninja;
//05-12-22 yxie create two abstract methods for interface routes
interface Routes {
	public function getRoutes(): array;
	public function getAuthentication(): \Ninja\Authentication;
}