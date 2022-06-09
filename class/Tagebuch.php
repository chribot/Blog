<?php
include_once 'Eintrag.php';

class Tagebuch
{
    public function newEntry(): void
    {
        date_default_timezone_set('Europe/Berlin');
        $now = date('Y-m-d H:i:s');

        // Daten lesen
        $json_data = file_get_contents("data/entries.json");
        $arr_entries = json_decode($json_data, true);

        // neue ID bestimmen
        if ($arr_entries !== null)
            $new_id = $arr_entries[count($arr_entries)-1]['id'] + 1;
        else
            $new_id = 1;

        // neuer Eintrag
        $content = $_REQUEST['content'] ?? '';
        $entry = new Eintrag($new_id, $now, $now, $content);

        // neuen Eintrag am Anfang einfügen
        array_unshift($arr_entries, $entry);

        // nach Erstelldatum sortieren
        //usort($arr_entries, "sortByDate");

        // Daten speichern
        file_put_contents("./data/entries.json", json_encode($arr_entries), LOCK_EX);
    }

    public function deleteEntry(int $id): void
    {
        // Daten lesen
        $json_data = file_get_contents("data/entries.json");
        /** @var Eintrag[] $arr_entries */
        $arr_entries = json_decode($json_data, true);

        // Eintrag löschen
        foreach ($arr_entries as $i => $entry) {
            if ($entry['id'] === $id) {
                array_splice($arr_entries, $i, 1);
                break;
            }
        }

        // Daten speichern
        file_put_contents("./data/entries.json", json_encode($arr_entries), LOCK_EX);
    }

    public function updateEntry(int $id): void
    {
        date_default_timezone_set('Europe/Berlin');
        $now = date('Y-m-d H:i:s');

        // Daten lesen
        $json_data = file_get_contents("data/entries.json");
        /** @var Eintrag[] $arr_entries */
        $arr_entries = json_decode($json_data, true);

        // Eintrag aktualisieren
        foreach ($arr_entries as &$entry) {
            if ($entry['id'] === $id) {
                if (isset($_REQUEST['content'])) {
                    $entry->setEditDate($now);
                    $content = $_REQUEST['content'] ?? '';
                    $entry->setContent($content);
                }
                break;
            }
        }

        // Daten speichern
        file_put_contents("./data/entries.json", json_encode($arr_entries), LOCK_EX);
    }

    public function getEntryById(int $id): Eintrag
    {
        $json_data = file_get_contents("data/entries.json");
        /** @var Eintrag[] $arr_entries */
        $arr_entries = json_decode($json_data, true);

        foreach ($arr_entries as $entry) {
            if ($entry['id'] === $id) {
                return new Eintrag($entry['id'], $entry['createDate'], $entry['editDate'], $entry['content']);
            }
        }
        return new Eintrag(0, '', '', '');
    }

    /**
     * @return Eintrag[]
     */
    public function getAllEntries(): array
    {
        $json_data = file_get_contents("data/entries.json");
        /** @var Eintrag[] $arr_entries */
        $arr_entries = json_decode($json_data, true);
        foreach ($arr_entries as $i => $entry) {
            $arr_entries[$i] = new Eintrag($entry['id'], $entry['createDate'], $entry['editDate'], $entry['content']);
        }
        return $arr_entries;
    }

/*
    function sortByDate($entry_a, $entry_b): int
    {
        if ($entry_a['create'] === $entry_b['create'])
            return 0;
        return ($entry_a['create'] > $entry_b['create']) ? -1 : 1;
    }
    */
}