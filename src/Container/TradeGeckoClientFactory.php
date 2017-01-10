<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrTradeGecko\Container;

use Interop\Container\ContainerInterface;
use ZfrTradeGecko\Exception\RuntimeException;
use ZfrTradeGecko\TradeGeckoClient;

/**
 * Create and return an instance of the TradeGecko client.
 *
 * Register this factory for the `ZfrTradeGecko\TradeGeckoClient` factory, and make sure to include the "config"
 * service (that must contains a "zfr_tradegecko" key). Supported configuration is:
 *
 * <code>
 *     'zfr_tradegecko' => [
 *         'access_token' => '' // A privileged access token (you can get it from your TradeGecko API admin)
 *     ]
 * </code>
 *
 * @author Michaël Gallego
 */
class TradeGeckoClientFactory
{
    /**
     * @param  ContainerInterface $container
     * @return TradeGeckoClient
     */
    public function __invoke(ContainerInterface $container): TradeGeckoClient
    {
        $config = $container->has('config') ? $container->get('config') : [];

        if (!isset($config['zfr_tradegecko'])) {
            throw new RuntimeException('Container config does not have a "zfr_tradegecko" key');
        }

        if (!isset($config['zfr_tradegecko']['access_token'])) {
            throw new RuntimeException('TradeGecko configuration must contain an access token');
        }

        return new TradeGeckoClient($config['zfr_tradegecko']['access_token']);
    }
}
