<div class="mb-3">
    <label for="name" class="form-label">{{__('blades/group.name_of_group')}}</label>
    <input type="text" name="name" required class="form-control" id="name{{isset($group->id)?$group->id:''}}" value="{{isset($group)?$group->name:''}}" placeholder="Digite o nome do grupo">
</div>
<div class="text-end">
    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
    <button type="submit" class="btn btn-success waves-effect waves-light">{{__('dashboard.btn_save')}}</button>
</div>
@if ($permissions->count())
    <div class="row mt-3">
        <ul class="w-100 d-flex justify-center flex-wrap flex-row p-3 pe-0" style="column-count: 3; border:1px solid #424e5a;">
            @php
                $last_index = '';
            @endphp
            @foreach($permissions as $permission)
                @if($last_index !== $permission->index())
                    @if($last_index !== '')
                        </ul> <!-- fecha a lista anterior -->
                    @endif
                    <li class="mb-3" style="width: 25%;">
                        <strong>{{ ucfirst($permission->index()) }}:</strong>
                        <ul class="pl-3 list-unstyled"> <!-- Inicia nova lista -->
                @endif
                @if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar', 'grupo.criar']))
                    <li>
                        <label>                        
                        <input name="permissions[]"
                            type="checkbox"
                            @if(isset($group) && $group->hasPermissionTo($permission->name)) checked @endif
                            value="{{ $permission->name }}">
                        </label>
                        {{ ucfirst($permission->name()) }}
                    </li>
                    @elseif(Auth::user()->can(['grupo.visualizar', 'grupo.editar']))
                    <li>
                        <label>                        
                        <input name="permissions[]"
                            type="checkbox"
                            @if(isset($group) && $group->hasPermissionTo($permission->name)) checked @endif
                            value="{{ $permission->name }}">
                        </label>
                        {{ ucfirst($permission->name()) }}
                    </li>
                @endif
                @php
                    $last_index = $permission->index();
                @endphp
            @endforeach
            </ul> <!-- fecha a última lista -->
            </li> <!-- fecha o último item de lista -->
        </ul> <!-- fecha o grupo -->
    </div>
@endif
