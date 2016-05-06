<?php
use PhpResque\Resque\Redis\RedisApi;

/**
 * Resque test case class. Contains setup and teardown methods.
 *
 * @package		Resque/Tests
 * @author		Chris Boulton <chris@bigcommerce.com>
 * @license		http://www.opensource.org/licenses/mit-license.php
 */
class TestCase extends PHPUnit_Framework_TestCase
{
	protected $resque;
	/**
	 * @var RedisApi
	 */
	protected $redis;

	public function setUp()
	{
		$config = file_get_contents(REDIS_CONF);
		preg_match('#^\s*port\s+([0-9]+)#m', $config, $matches);
		$this->redis = new RedisApi('localhost', $matches[1]);
		$this->redis->prefix(REDIS_NAMESPACE);
		$this->redis->select(REDIS_DATABASE);


		// Flush redis
		$this->redis->flushall();
	}
}