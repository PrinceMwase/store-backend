<template>
  <Menu>
    <MenuButton class="bg-blue">More</MenuButton>
    <transition
      enter-active-class="transition duration-100 ease-out"
      enter-from-class="transform scale-95 opacity-0"
      enter-to-class="transform scale-100 opacity-100"
      leave-active-class="transition duration-75 ease-out"
      leave-from-class="transform scale-100 opacity-100"
      leave-to-class="transform scale-95 opacity-0"
    >
    <MenuItems>
      <!-- Use the `active` slot prop to conditionally style the active item. -->
      <MenuItem v-slot="{ active }">
        <a
          :class="[
            active
              ? 'bg-blue-500 text-white'
              : 'bg-white text-black',
          ]"
          href="/account-settings"
        >
          Accountt settings
        </a>
      </MenuItem>
      <!-- ... -->
    </MenuItems>
     </transition>
  </Menu>
</template>

<script>
import '../tailwind/index.css'
    
  import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";



  export default {
    components: {
      Menu,
      MenuButton,
      MenuItems,
      MenuItem,
    },
    mounted(){
        
        console.log(this);
    }
  };
</script>