@props([
    'type' // Success | Failure
])

<!-- POP UPPPPPPPPPPPP -->
<div id="toastSuccess" class="toast position-fixed top-0 start-50 translate-middle-x m-3" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="background-color: rgba(180, 36, 36, 0); color: #c72828;">
        <strong class="me-auto">{{$type}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{$slot}}
    </div>
</div>
