<?php

// Use Case #4
// There's two groups, both of 10 students. Every student has a name (even Jaqen) and gets a grade. You can have some fun coming up with the content here :-)

// Provide an easy way to calculate the average score of a group.
// Add a function to move a student from one group to another.
// Show the average score of both groups. Move the top student from one group with the lowest scoring student from another. Show the averages again - how were these affected?



//définir la class student
class Student
{
    //nom de l'étudiant
    public string $name;
    //note de l'étudiant
    public float $note;
    //constructeur pour initialiser  le nom et la note de l'étudiant
    public function __construct(string $name, float $note)
    {
        $this->name = $name;
        $this->note = $note;
    }
}

//définir la classe studentgroup 
class studentGroup
{
    //tableau pour stocker les étudiants
    public array $students = [];
    //méthode pour ajouter un étudiant au groupe
    public function addStudent(Student $student)
    {
        $this->students[] = $student;
    }


    //méthode pour calculer la moyenne des notes du groupe
    public function calculateAverage()
    {
        $total = 0;
        foreach ($this->students as $student) {
            $total += $student->note;
        }
        //retourne la moyenne des notes ou 0  si le groupe est vide pour éviter une division par 0
        return count($this->students) > 0 ? $total / count($this->students) : 0;
    }


    //méthode pour déplacer un student vers un autre groupe
    public function moveStudent($student, $destinationGroup)
    {
        $index = array_search($student, $this->students);
        if ($index !== false) {
            unset($this->students[$index]);
            // $this->students = array_values($this->students);

        }
        $destinationGroup->students[] = $student;
    }
}


//créer des objets
$group1 = new studentGroup();
$group2 = new studentGroup();

//ajouter des prénoms aux étudiants
$names1 = ["Elisabeth", "Lucas", "Antoine", "Pierre", "Bastien", "Robin", "Layla", "Valentin", "Thomas", "Rosalie"];
$names2 = ["Alex V", "Alex Vdw", "Justine", "Elodie", "Carole", "Justin", "Virginie", "Kimi", "Mathias", "Okly"];

//ajouter étudiant au groupe
for ($i = 0; $i < 10; $i++) {
    // Note aléatoire entre 5 et 10
    $student = new Student($names1[$i], rand(50, 100) / 10);
    $group1->addStudent($student);
}

for ($i = 0; $i < 10; $i++) {
    $student = new Student($names2[$i], rand(50, 100) / 10);
    $group2->addStudent($student);
}

echo "Avant déplacement: <br>";
//afficher les prénoms et les notes respectives
foreach ($group1->students as $student) {
    echo "prénom: " . $student->name . " -> note: " . $student->note . "<br>";
}
echo "-> moyenne groupe 1 = " . $group1->calculateAverage() . "<br><br>";

foreach ($group2->students as $student) {
    echo "prénom: " . $student->name . " -> note: " . $student->note . "<br>";
}

//afficher les moyennes avant déplacement
echo "-> moyenne groupe 2 = " . $group2->calculateAverage() . "<br><br>";

echo "Après déplacement: <br>";



// Trier les étudiants du Groupe 1 en fonction des notes par ordre décroissant
//usort ne prend pas ce qui est après la virgule, du coup il faut faire *10 pour déplacer la virgule de 1 pour comparer des entiers. Mais ne s'affiche pas.
usort($group1->students, function ($a, $b) {
    return $b->note * 10 - $a->note * 10;
});

// Obtenir le meilleur étudiant du Groupe 1
$topStudent = array_shift($group1->students);
var_dump($topStudent);

// Trier les étudiants du Groupe 2 en fonction des notes par ordre croissant
usort($group2->students, function ($a, $b) {
    return $a->note * 10 - $b->note * 10;
});

// Obtenir l'étudiant avec la note la plus basse du Groupe 2
$lowestStudent = array_shift($group2->students);
var_dump($lowestStudent);

// Vérifier s'il y a un meilleur étudiant dans le Groupe 1 et un étudiant dans le Groupe 2 avant de déplacer
if ($topStudent && $lowestStudent) {
    $group1->moveStudent($topStudent, $group2);
    $group2->moveStudent($lowestStudent, $group1);
}


//déplacer les étudiants entre les groupes


foreach ($group1->students as $student) {
    echo "prénom: " . $student->name . " -> note: " . $student->note . "<br>";
}
echo "-> moyenne groupe 1: " . $group1->calculateAverage() . "<br><br>";

foreach ($group2->students as $student) {
    echo "prénom: " . $student->name . " -> note: " . $student->note . "<br>";
}

echo "-> moyenne groupe 2: " . $group2->calculateAverage() . "<br><br>";
