@if(isset($page) && $page instanceof App\Models\DTO\Page && !empty($page->title))
<div class="page-title">
    {{ $page->title }}
</div>
@endif
