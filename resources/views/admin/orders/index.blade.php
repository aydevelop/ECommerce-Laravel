@extends('layouts.admin')

@section('content')
    @component('admin.includes.title')
        Orders list
    @endcomponent

    <table class="table table-striped admin_users_table">
        <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($orders))
                @foreach($orders as $ord)
                    <tr>
                        <td>
                            {{ $ord->id }}
                        </td>
                        <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @if(!empty($statuses))
                                    @foreach($statuses as $status)
                                        <label class="label_status btn btn-primary {{ $ord->order_status_id == $status->id ? 'active':'' }}">
                                            <input type="radio" name="status" data-ord-id="{{ $ord->id }}" value="{{ $status->id }}" autocomplete="off"> {{ ucfirst($status->name) }}
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                        <td>
                            @if(!empty($ord->products))
                            {{
                                collect($ord->products)->map(function ($name) {
                                    return $name->name;
                                })
                            }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $orders->links() }}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
    <script>
            $(document).on("click", "label", function (e) {
                e.preventDefault();

                let stat_id = $(this).find("input").attr("value");
                let ord_id = $(this).find("input").data("ord-id");
                let url_edit = window.location.protocol +'//'+ window.location.hostname + "/admin/orders/" + ord_id;
                let el = $(this);

                $.ajax({
                    url: url_edit,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                    },
                    type: 'PUT',
                    data: "status=" + stat_id,
                    error: function(result) {
                        el.removeClass('active');
                    }
                });

            });
    </script>
@endsection
