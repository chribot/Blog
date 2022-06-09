<?php
/**
 * @var $diary
 */
$arr_entries = $diary->getAllEntries();

foreach ($arr_entries as $entry) { ?>
    <div class="entry">
        <div class="created">
        <?php
            setlocale(LC_TIME, "de_DE");
            $create_timestamp = strtotime($entry->getCreateDate());
            $day = date('d', $create_timestamp);
            $month = strftime("%b", $create_timestamp);
            $year = date('Y', $create_timestamp);
        ?>
            <div class="day"><?php echo $day; ?></div>
            <div class="month"><?php echo $month; ?></div>
            <div class="year"><?php echo $year; ?></div>
        </div>
        <div class="message">
            <div class="message-text">
                <?php echo $entry->getContent(); ?>
            </div>
            <div class="message-footer">
                <div class="edited">
                    <?php echo 'Bearbeitet: ' . substr($entry->getEditDate(), 0, -3); ?>
                </div>
                <form class="edit-form" action="index.php?action=edit" method="post">
                    <input type="hidden" value="<?php echo $entry->getId(); ?>" name="id">
                    <button class="b-change" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>