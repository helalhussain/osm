<x-admin.modal
    enctype="multipart/form-data" size="lg"
    :title="isset($administator) ? 'Update Administator' : 'Add New Administrator'"
    :action="isset($administator) ? route('admin.administator.update', $administator->id) : route('admin.administator.store')"
    :button="isset($administator) ? 'Update' : 'Submit'"
>
    @isset($administator)
        @method('PUT')
    @endisset

    <x-admin.form-group label="name" placeholder="Enter name" :value="$administator->name ?? ''" column="col-lg-6" required/>
    <x-admin.form-group label="email" placeholder="Enter email" :value="$administator->email ?? '' " column="col-lg-6" required/>
    <x-admin.form-group label="employee_id" placeholder="Enter Employee ID" :value="$administator->employee_id ?? '' " column="col-lg-6"/>
    <x-admin.form-group label="designation" placeholder="Enter designation" :value="$administator->designation ?? '' " column="col-lg-6"/>
        <x-admin.form-group label="joining" type="date" placeholder="Enter joining" :value="$administator->joining ?? '' " column="col-lg-6"/>
            <x-admin.form-group label="birthdate" type="date" placeholder="Enter birthdate" :value="$administator->dob ?? '' " column="col-lg-6"/>
            <x-admin.form-group label="gender" class="mb-3" :required="false" isType="select" class="select2"
                                column="col-lg-6">

                                <option value="{{ $administator->gender ?? '' }}">{{ $administator->gender ?? 'Select Gender' }}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </x-admin.form-group>
                            <x-admin.form-group label="phone" placeholder="Enter phone" :value="$administator->phone ?? '' " column="col-lg-6"/>
                                <x-admin.form-group label="address" placeholder="Enter address" :value="$administator->address ?? '' " column="col-lg-6"/>
                                    <x-admin.form-group label="image" for="image" class="mb-3" :required="false" type="file"
                                    data-show-image="show_administrator_image" column="col-lg-6"/>
                                    @empty($administator)
    <x-admin.form-group type="password" class="showPassword" label="password" placeholder="Enter password" :value="$administator->passowrd ?? ''" column="col-lg-6" required/>
    <x-admin.form-group type="password" class="showPassword" label="password_confirmation" placeholder="Enter confirm password" column="col-lg-6" required/>
    <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" id="checkBtn" class="form-check-input"
                id="customControlInline">
            <label class="form-label" for="customControlInline">Show/hide Password</label>
        </div>
    </div>
    @endempty


</x-admin.modal>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#checkBtn').click(function(){
    if('password' == $('.showPassword').attr('type')){
         $('.showPassword').prop('type', 'text');
    }else{
         $('.showPassword').prop('type', 'password');
    }
});

    });
</script>

