@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('status'))
                toastr.success(@json(session('status')));
            @endif

            @if (session('error'))
                toastr.error(@json(session('error')));
            @endif

            @if (session('info'))
                toastr.info(@json(session('info')));
            @endif

            @if (session('warning'))
                toastr.warning(@json(session('warning')));
            @endif
        });
    </script>
@endpush
