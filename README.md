# Custom bridges for RSS-Bridge
Collection of custom bridges for RSS-Bridge.


## [OAuth2 Reddit bridge - `RedditBridge`](bridges/RedditBridge.php)

Modified [RSS-Bridge](https://github.com/RSS-Bridge/rss-bridge/tree/master) [Reddit bridge](https://github.com/RSS-Bridge/rss-bridge/blob/master/bridges/RedditBridge.php), which accesses the Reddit API via Reddit app.

**This bridge replaces the original Reddit bridge.**

This is just a standalone backup of bridge from: https://github.com/RSS-Bridge/rss-bridge/pull/5039 <br>
The bridge is modified from the PR to be able to use it standalone, without dedicated `RedditClient`.


## [YouTube bridge with cached RSS URL resolution - `YoutubeBridge`](bridges/YoutubeBridge.php)

Modified [RSS-Bridge](https://github.com/RSS-Bridge/rss-bridge/tree/master) [YouTube bridge](https://github.com/RSS-Bridge/rss-bridge/blob/master/bridges/YoutubeBridge.php) with cached RSS URL resolution.

**This bridge replaces the original YouTube bridge.**

This bridge has only one modification from the original - the RSS URL resolution for custom names is cached for 30 days.
When using custom names (starting with `@`) the bridge needs to open the channel page to extract the ID for RSS feed URL.
Since ID for the custom name shouldn't change, neither should RSS URL, so the result can be cached for a long time.


## [YouTube shorts for RSS-Bridge - `YoutubeShortsBridge`](bridges/YoutubeShortsBridge.php)

Modified [RSS-Bridge](https://github.com/RSS-Bridge/rss-bridge/tree/master) [YouTube bridge](https://github.com/RSS-Bridge/rss-bridge/blob/master/bridges/YoutubeBridge.php) responding only with YouTube shorts.

**This is a new bridge, it doesn't replace the original YouTube one.**

Looking up shorts in a channel/user/custom name is supported.
Looking up by search or playlist is not.

This bridge can have a increased response time compared to regular YouTube bridge, as you need to load a page for each short to get their published date.
You can limit how many items are returned, which should improve the response time.
