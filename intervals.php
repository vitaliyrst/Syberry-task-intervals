<?php

function getCleanNotes(): array
{
    $notes = ['Cb', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'E#', 'Fb',
        'F', 'F#', 'Gb', 'G', 'G#', 'Ab', 'A', 'A#', 'Bb', 'B', 'B#'];
    $cleanNotes = [];

    foreach ($notes as $note) {
        if (strlen($note) == 1) {
            $cleanNotes[] = $note;
        }
    }

    return $cleanNotes;
}

function getCleanNote(string $firstNote): string
{
    if (strlen($firstNote) > 1) {
        $cleanNote = substr($firstNote, 0, 1);
    } else {
        $cleanNote = $firstNote;
    }

    return $cleanNote;
}

function getIntervals(): array
{
    return $intervals = ['m2' => ['1', '2'], 'M2' => ['2', '2'], 'm3' => ['3', '3'],
        'M3' => ['4', '3'], 'P4' => ['5', '4'], 'P5' => ['7', '5'], 'm6' => ['8', '6'],
        'M6' => ['9', '6'], 'm7' => ['10', '7'], 'M7' => ['11', '7'], 'P8' => ['12', '8']];
}

//For intervalConstruction
function getSecondNoteWithDistance(string $firstNote, string $degree, $order = 'asc'): array
{
    $cleanNote = getCleanNote($firstNote);
    $cleanNotes = getCleanNotes();
    $keyNote = array_search($cleanNote, $cleanNotes);

    while (key($cleanNotes) !== $keyNote) {
        next($cleanNotes);
    }

    $distance = 0;

    if ('#' == substr($firstNote, 1, 1)) {
        if ($order == 'dsc') {
            $distance = 1;
        } else {
            $distance = -1;
        }
    } elseif ('b' == substr($firstNote, 1, 1)) {
        if ($order == 'dsc') {
            $distance = -1;
        } else {
            $distance = 1;
        }
    }

    if ($order == 'dsc') {
        for ($i = $degree - 1; $i > 0; $i--) {
            if ((current($cleanNotes) == 'C') || (current($cleanNotes) == 'F')) {
                $distance += 1;
            } else {
                $distance += 2;
            }

            if (key($cleanNotes) == 0) {
                end($cleanNotes);
            } else {
                prev($cleanNotes);
            }
        }
    } else {
        for ($i = $degree - 1; $i > 0; $i--) {
            if ((current($cleanNotes) == 'B') || (current($cleanNotes) == 'E')) {
                $distance += 1;
            } else {
                $distance += 2;
            }

            if (key($cleanNotes) == (count($cleanNotes) - 1)) {
                reset($cleanNotes);
            } else {
                next($cleanNotes);
            }
        }
    }

    return [current($cleanNotes), $distance];
}

//For intervalIdentification
function getSemitoneDifference(string $note): int
{
    $input = ['Cbb', 'Cb', 'C', 'C#', 'C##', 'Dbb', 'Db', 'D', 'D#', 'D##', 'Ebb', 'Eb', 'E', 'E#', 'E##', 'Fbb', 'Fb',
        'F', 'F#', 'F##', 'Gbb', 'Gb', 'G', 'G#', 'G##', 'Abb', 'Ab', 'A', 'A#', 'A##', 'Bbb', 'Bb', 'B', 'B#', 'B##'];

    if (!array_search($note, $input)) {
        throw new Error('Bad input');
    }

    $difference = 0;
    if (substr($note, 1) == '##' || substr($note, 1) == '#') {
        $difference = strlen(substr($note, 1));
    } elseif (substr($note, 1) == 'bb' || substr($note, 1) == 'b') {
        $difference = -strlen(substr($note, 1));
    }

    return $difference;
}

//For intervalIdentification
function getDegreeWithSemitone(string $firstNote, string $secondNote, $order = 'asc'): array
{
    $firstCleanNote = getCleanNote($firstNote);
    $secondCleanNote = getCleanNote($secondNote);
    $cleanNotes = getCleanNotes();
    $keyNoteFirst = array_search($firstCleanNote, $cleanNotes);
    $keyNoteSecond = array_search($secondCleanNote, $cleanNotes);
    $diffFirstNote = getSemitoneDifference($firstNote);
    $diffSecondNote = getSemitoneDifference($secondNote);

    while (key($cleanNotes) !== $keyNoteFirst) {
        next($cleanNotes);
    }

    $degree = 1;
    $distance = 0;

    do {
        if ($order == 'dsc') {
            if ((current($cleanNotes) == 'C') || (current($cleanNotes) == 'F')) {
                $distance += 1;
            } else {
                $distance += 2;
            }
            if (key($cleanNotes) == 0) {
                end($cleanNotes);
            } else {
                prev($cleanNotes);
            }
        } else {
            if ((current($cleanNotes) == 'B') || (current($cleanNotes) == 'E')) {
                $distance += 1;
            } else {
                $distance += 2;
            }
            if (key($cleanNotes) == count($cleanNotes) - 1) {
                reset($cleanNotes);
            } else {
                next($cleanNotes);
            }
        }
        $degree += 1;
    } while (key($cleanNotes) !== $keyNoteSecond);

    $diff = $diffFirstNote - $diffSecondNote;

    if ($order == 'dsc') {
        $semitone = $distance + $diff;
    } else {
        $semitone = $distance - $diff;
    }

    return [$semitone, $degree];
}

function intervalConstruction(array $arr): string
{
    if (count($arr) > 3 || count($arr) < 2) {
        throw new Error('Illegal number of elements in input array');
    }

    $intervals = getIntervals();
    $order = $arr[2];
    $firstNote = $arr[1];
    $degree = $intervals[$arr[0]][1];
    $data = getSecondNoteWithDistance($firstNote, $degree, $order);
    $semitone = $intervals[$arr[0]][0];
    $secondNote = $data[0];
    $distance = $data[1];

    if ($semitone < $distance) {
        $difference = $distance - $semitone;
        for ($i = $difference; $i > 0; $i--) {
            if ($order == 'dsc') {
                $secondNote .= '#';
            } else {
                $secondNote .= 'b';
            }
        }
    } else {
        $difference = $semitone - $distance;
        for ($i = $difference; $i > 0; $i--) {
            if ($order == 'dsc') {
                $secondNote .= 'b';
            } else {
                $secondNote .= '#';
            }
        }
    }

    return $secondNote;
}

function intervalIdentification(array $arr): string
{
    $data = getDegreeWithSemitone($arr[0], $arr[1], $arr[2]);
    $allIntervals = getIntervals();
    $interval = '';

    foreach ($allIntervals as $intervals => $value) {
        if ($value[0] == $data[0] && $value[1] == $data[1]) {
            $interval = $intervals;
        }
    }

    if ($interval == '') {
        throw new Error('Cannot identify the interval');
    }

    return $interval;
}
