@if(isset($page) && $page instanceof App\Models\DTO\Page)
<div class="page-title">
    {{ $page->title }}
</div>
@endif
