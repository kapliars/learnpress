<?php
/**
 * Section template.
 *
 * @since 3.0.0
 */

learn_press_admin_view( 'course/section-item' );
learn_press_admin_view( 'course/new-section-item' );

?>
<script type="text/x-template" id="tmpl-lp-section">
    <div class="section" :class="isOpen ? 'open' : 'close'">
        <div class="section-head" @dblclick="toggle">
            <span class="movable"></span>
            <input v-model="section.title"
                   type="text"
                   title="title"
                   class="title-input"
                   @blur="maybeUpdate"
                   @change="shouldBeStore"
                   @keyup.enter="update"
                   placeholder="<?php esc_attr_e( 'Enter the name section', 'learnpress' ); ?>">

            <div class="actions">
                <span class="collapse" :class="isOpen ? 'open' : 'close'" @click.prevent="toggle"></span>
            </div>
        </div>

        <div class="section-collapse">
            <div class="section-content">
                <div class="details">

                    <input v-model="section.description"
                           type="text"
                           class="description-input"
                           title="description"
                           @blur="maybeUpdate"
                           @change="shouldBeStore"
                           @keyup.enter="update"
                           placeholder="<?php echo esc_attr( 'Describe about this section', 'learnpress' ); ?>">
                </div>

                <div class="section-list-items" :class="{'no-item': !section.items.length}">
                    <draggable v-model="items" :element="'ul'" :options="optionDraggable">
                        <lp-section-item
                                @update="updateItem"
                                @remove="removeItem" v-for="(item, index) in section.items" :item="item"
                                :key="item.id" :order="index+1"></lp-section-item>
                    </draggable>

                    <lp-new-section-item @create="newSectionItem"></lp-new-section-item>
                </div>
            </div>

            <div class="section-actions">
                <button type="button" class="button button-secondary"
                        @click="openChooseItems"><?php esc_html_e( 'Add items', 'learnpress' ); ?></button>

                <div class="remove" @click="remove">
                    <span class="dashicons dashicons-trash"></span>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    (function (Vue, $store) {

        Vue.component('lp-section', {
            template: '#tmpl-lp-section',
            props: ['section', 'index'],
            data: function () {
                return {
                    open: true,
                    unsaved: false
                };
            },
            computed: {
                isOpen: function () {
                    var section = this.section;
                    var hiddenSections = $store.getters['hiddenSections'];
                    var find = hiddenSections.find(function (sectionId) {
                        return parseInt(section.id) === parseInt(sectionId);
                    });

                    if (find) {
                        this.open = false;
                    }

                    return this.open;
                },

                items: {
                    get: function () {
                        return this.section.items;
                    },
                    set: function (items) {
                        this.section.items = items;

                        $store.dispatch('updateSectionItems', {
                            sectionId: this.section.id,
                            items: items
                        });
                    }
                },

                optionDraggable: function () {
                    return {
                        handle: '.icon',
                        draggable: '.section-item',
                        group: {
                            name: 'lp-section-items',
                            put: true,
                            pull: true
                        }
                    };
                }
            },
            methods: {
                toggle: function () {
                    this.open = !this.open;
                    $store.dispatch('toggleSection', {
                        open: this.open,
                        section: this.section
                    });
                },
                newSectionItem: function (item) {
                    $store.dispatch('newSectionItem', {
                        sectionId: this.section.id,
                        item: item
                    });
                },
                removeItem: function (item) {
                    $store.dispatch('removeSectionItem', {
                        sectionId: this.section.id,
                        itemId: item.id
                    });
                },
                updateItem: function (item) {
                    $store.dispatch('updateSectionItem', {
                        sectionId: this.section.id,
                        item: item
                    });
                },
                remove: function () {
                    var r = window.confirm($store.getters['i18n/all'].remove_section);

                    if (!r) {
                        return;
                    }

                    $store.dispatch('removeSection', {
                        index: this.index,
                        section: this.section
                    });
                },
                shouldBeStore: function () {
                    this.unsaved = true;
                },
                maybeUpdate: function () {
                    if (this.unsaved) {
                        this.update();
                    }
                },
                update: function () {
                    this.unsaved = false;
                    $store.dispatch('updateSection', JSON.stringify(this.section));
                },
                openChooseItems: function () {
                    $store.dispatch('ci/open', parseInt(this.section.id));
                }
            }
        });

    })(Vue, LP_Curriculum_Store);
</script>
