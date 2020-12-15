In music theory, an interval is a distance between two notes. This distance is specified using a letter and a number. For example, valid names of intervals are M3, P5, or m7. The letter and the number in the interval name mean specific things.

As in maths, if we're saying than the distance on a centimeter ruler between 3 and 5 is 2 centimeters, in music we're saying that the distance between C and E (or 'do' and 'mi') is M3.

For the purpose of this task, we're using the following note names:
C D E F G A B

The whole list of intervals we're using in this task:
m2, M2, m3, M3, P4, P5, m6, M6, m7, M7, P8

The number of an interval is the number of letter names or staff positions (lines and spaces) it contains, including the positions of both notes forming the interval. For instance, the interval C–G is a fifth (denoted P5) because the notes from C to the G above it contain five letter names (C, D, E, F, G) and occupy five consecutive staff positions, including the positions of C and G. The interval from A to A contains 8 notes (A B C D E F G A) and is called P8. We will call this number a diatonic degree (please note: the term 'degree' we are using here may not correspond to the actual term in music).

The one unit of a distance between notes is called a semitone.

Letter names can be modified by the accidentals. The sharp '#' raises a note by a semitone, and a flat 'b' lowers it by a semitone. You can add at most two sharp signs and two flat signs to the note.

The following table shows 12 notes of a chromatic scale built on C. Distance between each note in a table is a semitone. Note that the same note can be described using different letters. For example, if we raise C by a semitone, we'll get C#. And if we lower D by a semitone, we'll get Db.

C C#/Db D D#/Eb E F F#/Gb G G#/Ab A A#/Bb B

For example, there are 4 semitones distance between C and E, 5 semitones distance between D and G, and 1 semitone distance between Bb and B.

If we add any accidentals to the notes that form an interval, by definition the notes do not change their degree. As a consequence, any interval has the same interval number as the corresponding natural interval (means an interval formed by the same notes without accidentals). For instance, the intervals C–G# (spanning 8 semitones) and C#–G (spanning 6 semitones) are fifths, like the corresponding natural interval C–G (7 semitones).

Notice that interval numbers represent an inclusive count of contained degrees or the note names, but not the difference between the endpoints. In other words, you count the first note as one, not zero. By this logic, the interval C–D is a second (M2), but D is only one degree above C. Similarly, C–E is a third (M3), but E is only two degrees above C, and so on.

We will only use intervals up to an octave (P8, 12 semitones).

To build an interval from the given note, you first have to find a note diatonic degree lower or higher than a given note.

Then you have to count the number of semitones from the starting note. In C D E F G A B sequence there is one semitone between E and F and B and C. Between other notes there are two semitones.

Here one dash means one semitone:
C--D--E-F--G--A--B-C

Example
Let's count the number of semitones between C and G: C to D - 2 semitones, D to E - 2 semitones, E to F - 1 semitone, F to G - 2 semitones. 2 + 2 + 1 + 2 = 7 semitones.
Now let's find the number of semitones between A and C: A to B - 2 semitones, B to C - 1 semitone. 2 + 1 = 3 semitones.

Example
Now let's find our first interval - P5 (perfect fifth) from Ab. P5 means: find a distance of 5 degrees and 7 semitones.
First, find the 5th degree from A, ignoring 'b':
(A B C D E) - E is the 5th-degree note from A.
Now count semitones: from Ab to B - 3 semitones (from Ab to A - 1 semitone, from A to B - 2 semitones), from B to C - 1 semitone, from C to D - 2 semitones, from D to E - 2 semitones. 3 + 1 + 2 + 2 = 8 semitones. This is too much, we need only 7 semitones, but we need to stay on E. To do so, lower E by one semitone using accidental 'b'.
At P5 distance from Ab is the note Eb.
Note: you can't write D# as an answer, because even if D# is 7 semitones from Ab, it has a different degree (it takes only 4 degrees from A to D).

Example
To show you how to work with accidentals, let's find P5 (5th degree, 7 semitones) from A#:
As in a previous example, find the 5th degree from A, ignoring '#':
(A B C D E) - E is the 5th note from A (and from A#).
Now count semitones: from A# to B - 1 semitone, from B to C - 1 semitone, from C to D - 2 semitones, from D to E - 2 semitones. 1 + 1 + 2 + 2 = 6 semitones. We need to add just one semitone by adding #: E#
At P5 distance from A# is the note E#.

Example
Let's find m2 (2nd degree, 1 semitone) from Fb: To find a second degree is easy: (F G) - G is the second note from F.
Now count semitones: from Fb to G is 3 semitones. This is way too much, we need just one. SO we have to lower G by 2 semitones. To do so, add two flat 'b' signs to G note: Gbb.
At m2 distance from Fb is the note Gbb.

Intervals names, quality, and quantity
m2 - Minor Second - 1 semitone, 2 degrees
M2 - Major Second - 2 semitones, 2 degrees
m3 - Minor Third - 3 semitones, 3 degrees
M3 - Major Third - 4 semitones, 3 degrees
P4 - Perfect Fourth - 5 semitones, 4 degrees
P5 - Perfect Fifth - 7 semitones, 5 degrees
m6 - Minor Sixth - 8 semitones, 6 degrees
M6 - Major Sixth - 9 semitones, 6 degrees
m7 - Minor Seventh - 10 semitones, 7 degrees
M7 - Major Seventh - 11 semitones, 7 degrees
P8 - Perfect Octave - 12 semitones, 8 degrees

Your task is to implement two functions that'll work with intervals: one will construct an interval and the second will identify the interval.

Requirements:
intervalConstruction

The function 'intervalConstruction' must take an array of strings as input and return a string.
An array contains three or two elements.
The first element in an array is an interval name, the second is a starting note, and the third indicates whether an interval is ascending or descending.
If there is no third element in an array, the building order is ascending by default.
The function should return a string containing a note name.
Only the following note names are allowed in a return string:
Cbb Cb C C# C## Dbb Db D D# D## Ebb Eb E E# E## Fbb Fb F F# F## Gbb Gb G G# G## Abb Ab A A# A## Bbb Bb B B# B##
If there are more or fewer elements in the input array, an exception should be thrown: "Illegal number of elements in input array"
Convention: ['a', 'b'] here means an array of strings

Input examples and meaning:
Please note: The data your function will get will look like an array of strings as defined in your language. No additional parsing is needed! The form ['', ''] is just a convention!
The following notes are allowed in input:
Cb C C# Db D D# Eb E E# Fb F F# Gb G G# Ab A A# Bb B B#
The following intervals are allowed in input:
m2 M2 m3 M3 P4 P5 m6 M6 m7 M7 P8

['M3', 'A', 'asc'] - build an ascending M3 interval starting from A
['m7, 'Fb', 'dsc'] - build an descending m7 interval starting from Fb
['P5', 'C'] - build an ascending P5 interval starting from C
['P4', 'E#'] - build an ascending P4 interval starting from E#

intervalIdentification

The function 'intervalIdentification' must take an array of strings as input and return a string.
An array contains three or two elements.
The first element is the first note in the interval, the second element is the last note in the interval, the third indicates whether an interval is ascending or descending.
If there is no third element in an array, the interval is considered ascending by default.
The function should return a string - name of the interval.
Only the following intervals are allowed in a return string:
m2 M2 m3 M3 P4 P5 m6 M6 m7 M7 P8
If the interval does not fit a description, an exception should be thrown: "Cannot identify the interval".
Convention: ['a', 'b'] here means an array of strings

Input examples and meaning:
Please note: The data your function will get will look like an array of strings as defined in your language. No additional parsing is needed! The form ['', ''] is just a convention!
The following notes are allowed in input:
Cbb Cb C C# C## Dbb Db D D# D## Ebb Eb E E# E## Fbb Fb F F# F## Gbb Gb G G# G## Abb Ab A A# A## Bbb Bb B B# B##

['C', 'D'] - find an ascending interval between C and D
['C#', 'Fb'] - find an ascending interval between C# and Fb
['A', 'G#', 'asc'] - find an ascending interval between A and G#