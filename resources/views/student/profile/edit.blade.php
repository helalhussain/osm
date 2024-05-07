<x-admin.modal
    title="Update Profile"
    :action="route('profile.update')"
    button="Update"
    id="submit"
    enctype="multipart/form-data"
>
    @method('patch')

    <x-admin.form-group
        label="name"
        placeholder="Enter name"
        :value="auth()->user()->name"
    />
    <x-admin.form-group
    label="phone"
    placeholder="Enter phone"
    :value="auth()->user()->phone" column="col-lg-6"
/>
<x-admin.form-group  label="date" type="date" class="mb-3" :value="auth()->user()->dob ?? ''"
    column="col-lg-6" /><br/>
<x-admin.form-group
label="address"
placeholder="Enter address"
:value="auth()->user()->address"
/>
<x-admin.form-group label="gender" :required="false" isType="select" class="select2" column="col-lg-6">
    {{-- <option value="{{ $notice->cls_id ?? '' }}">{{ $notice->cls->title ?? 'Select Class' }}</option> --}}

    <option value="Male">Male</option>
    <option value="Male">Female</option>
    <option value="Male">Other</option>

</x-admin.form-group>

     <x-admin.form-group
        label="image"
        type="file"
        accept="image/*" column="col-lg-6"
        data-show-image="show_profile_image"
    />
</x-admin.modal>
