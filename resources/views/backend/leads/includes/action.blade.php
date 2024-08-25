<div class="dtb-actions">


    <button
        title="View" class="float-left mr-2 btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal{{ $lead->id }}">
           Show
</button>

<div class="modal fade" id="exampleModal{{ $lead->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lead Updates</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          @foreach($lead->lead_update as $update)
                <p>
                    {{  $update->lead_message}}
                </p><hr>
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <a
        href="{{ route('admin.leads.edit', $lead->id) }}"
        title="Edit" class="float-left mr-2 btn btn-xs btn-success">
        Edit
    </a>


    {{-- <div class="float-left">
        <form method="POST" action="{{ route('admin.leads.destroy', $lead->id) }}" accept-charset="UTF-8" data-toggle="tooltip" title="{{__('common.sure')}}" data-original-title="Delete">
            @csrf
            @method('DELETE')
            <a href="#" class="float-left mr-2 btn btn-xs btn-danger " data-toggle="modal" data-target="#confirmDelete" data-title="{{__('common.sure')}}" data-message="{{__('common.want_to_delete')}}">
                <i class="material-icons text-md">delete</i>
            </a>
        </form>
    </div> --}}


</div>
