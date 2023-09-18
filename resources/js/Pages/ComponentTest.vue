<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Label from "@/Components/InputLabel.vue";
import Input from "@/Components/TextInput.vue";
// @/Layouts/Guest.vue → @/Layouts/GuestLayout.vue
// @/Components/Label.vue → @/Components/InputLabel.vue
// @/Components/Input.vue → @/Components/TextInput.vue
const emitTest = (e) => console.log(e);
</script>

<template>
    <GuestLayout>
        <Label value="件名">タイトル</Label>
        <Input
            modelValue="初期値が入ります"
            @update:modelValue="emitTest"
        ></Input>
    </GuestLayout>
</template>
