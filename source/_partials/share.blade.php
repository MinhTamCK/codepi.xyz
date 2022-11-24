<button class="share-button" data-sharer="facebook" data-url="{{ $page->getUrl() }}" style="background: #3b5998;">
    Facebook
</button>

<button class="share-button" data-sharer="twitter" data-url="{{ $page->getUrl() }}" data-title="{{ $page->title }}" style="background: #00aced;">
    Twitter
</button>

<button class="share-button" data-sharer="reddit" data-url="{{ $page->getUrl() }}" style="background: #ff4500;">
    Reddit
</button>

<button class="share-button" data-sharer="linkedin" data-url="{{ $page->getUrl() }}" style="background: #0077b5;">
    LinkedIn
</button>