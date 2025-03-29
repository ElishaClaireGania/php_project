// Define book details
const books = {
    "assembly_language": {
        title: "Assembly Language Programming: ARM Cortex-M3",
        description: "ARM designs the cores of microcontrollers which equip most embedded systems based on 32-bit processors. Cortex M3 is one of these designs, recently developed by ARM with microcontroller applications in mind. To conceive a particularly optimized piece of software (as is often the case in the world of embedded systems) it is often necessary to know how to program in an assembly language.This book explains the basics of programming in an assembly language, while being based on the architecture of Cortex M3 in detail and developing many examples.It is written for people who have never programmed in an assembly language and is thus didactic and progresses step by step by defining the concepts necessary to acquiring a good understanding of these techniques.",
        image: "images/assembly.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    },
    "black_beauty": {
        title: "Black is Beautiful: A Philosophy of Black Aesthetics",
        description: "Black is Beautiful identifies and explores the most significant philosophical issues that emerge from the aesthetic dimensions of black life, providing a long-overdue synthesis and the first extended philosophical treatment of this crucial subject. It addresses an important area that has been almost entirely neglected by philosophical aesthetics and the philosophy of art, taking a significant step in establishing black aesthetics as an object of philosophical study. By uniting philosophical aesthetics with black cultural theory, the book dissolves the dilemma of choosing between studying philosophy or black expressive culture. It brings together diverse fields, including visual culture studies, art history, analytic philosophy, and musicology, fostering mutually illuminating approaches that challenge fundamental assumptions within each discipline. Well-balanced, up-to-date, and beautifully written, Black is Beautiful is both inventive and insightful, earning it the American Society of Aesthetics Outstanding Monograph Prize in 2017.",
        image: "images/black_beauty.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    },
    "creative_management": {
        title: "Creative Management of Complex Systems",
        description: "This concept is most interesting to consider when managingorganizations,as it requires distinctive planning, managing andoperating techniques.Complexity is born of interactions between amultitude of actors that are possibly aware but often unaware of thefact that they belong to the same system, with the formation offeedback loops that render the system's evolution largelyunpredictable. Complex systems have very specific properties,particularly the nonlinear response to stimuli that must be taken intoaccount by the managers who are in charge of regulating or steeringthem. Whereas an engineer can manage a complicated system(oftenby way of technology), it is an exaggeration to the claim thattheadministration of a complex organization is “managing” the system.",
        image: "images/creative_management.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    },
    "decision_analytics": {
        title: "Decision Analytics and Optimization in Disease Prevention and Treatment",
        description: "Decision Analytics and Optimization in Disease Prevention and Treatment offers a comprehensive resource of the most current decision models and techniques for disease prevention and treatment. With contributions from leading experts in the field, this important resource presents information on the optimization of chronic disease prevention, infectious disease control and prevention, and disease treatment and treatment technology. Designed to be accessible, in each chapter the text presents one decision problem with the related methodology to showcase the vast applicability of operations research tools and techniques in advancing medical decision making.This vital resource features the most recent and effective approaches to the quickly growing field of healthcare decision analytics, which involves cost-effectiveness analysis, stochastic modeling, and computer simulation. Throughout the book, the contributors discuss clinical applications of modeling and optimization techniques to assist medical decision making within complex environments.",
        image: "images/creative_management.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    },
    "enable_tech": {
        title: "Enabling Technologies for High Spectral-Efficiency Coherent Optical Communication Networks",
        description: "This book examines key technology advances in high spectral-efficiency fiber-optic communication systems and networks, enabled by the use of coherent detection and digital signal processing (DSP). The first of this book's 16 chapters is a detailed introduction. Chapter 2 reviews the modulation formats, while Chapter 3 focuses on detection and error correction technologies for coherent optical communication systems. Chapters 4 and 5 are devoted to Nyquist-WDM and orthogonal frequency-division multiplexing (OFDM). In chapter 6, polarization and nonlinear impairments in coherent optical communication systems are discussed. The fiber nonlinear effects in a non-dispersion-managed system are covered in chapter 7. Chapter 8 describes linear impairment equalization and Chapter 9 discusses various nonlinear mitigation techniques. Signal synchronization is covered in Chapters 10 and 11. Chapter 12 describes the main constraints put on the DSP algorithms by the hardware structure. Chapter 13 addresses the fundamental concepts and recent progress of photonic integration. Optical performance monitoring and elastic optical network technology are the subjects of Chapters 14 and 15. Finally, Chapter 16 discusses spatial-division multiplexing and MIMO processing technology, a potential solution to solve the capacity limit of single-mode fibers.",
        image: "images/creative_management.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    },
    "geo_science": {
        title: "Evolution of Geologic Sciences",
        description: "Examines the various branches of the geological sciences, as well as the methods and instruments used by geologists to obtain accurate records of the planet's geological history.",
        image: "images/creative_management.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    },
    "knowledge_risk": {
        title: "Knowledge in Risk Assessment and Management",
        description: "Risk assessment and management is fundamentally founded on the knowledge available on the system or process under consideration. While this may be self-evident to the laymen, thought leaders within the risk community have come to recognize and emphasize the need to explicitly incorporate knowledge (K) in a systematic, rigorous, and transparent framework for describing and modeling risk. Featuring contributions by an international team of researchers and respected practitioners in the field, this book explores the latest developments in the ongoing effort to use risk assessment as a means for characterizing knowledge and/or lack of knowledge about a system or process of interest. By offering a fresh perspective on risk assessment and management, the book represents a significant contribution to the development of a sturdier foundation for the practice of risk assessment and for risk-informed decision making.",
        image: "images/creative_management.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    },
    "simulation_analysis": {
        title: "Simulation and Analysis of Mathematical Methods in Real-Time Engineering Applications",
        description: "This breakthrough edited volume highlights the security, privacy, artificial intelligence, and practical approaches needed by engineers and scientists in all fields of science and technology. It highlights the current research, which is intended to advance not only mathematics but all areas of science, research, and development, and where these disciplines intersect. As the book is focused on emerging concepts in machine learning and artificial intelligence algorithmic approaches and soft computing techniques, it is an invaluable tool for researchers, academicians, data scientists, and technology developers. The newest and most comprehensive volume in the area of mathematical methods for use in real - time engineering, this groundbreaking new work is a must- have for any engineer or scientist's library.Also useful as a textbook for the student, it is a valuable contribution to the advancement of the science, both a working handbook for the new hire or student, and a reference for the veteran engineer.",
        image: "images/creative_management.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    },
    "yeast": {
        title: "Yeast: Molecular and Cell Biology",
        description: "Finally, a stand-alone, all-inclusive textbook on yeast biology. Based on the feedback resulting from his highly successful monograph, Horst Feldmann has totally rewritten he contents to produce a comprehensive, student-friendly textbook on the topic. The scope has been widened, with almost double the content so as to include all aspects of yeast biology, from genetics via cell biology right up to biotechnology applications. The cell and molecular biology sections have been vastly expanded, while information on other yeast species has been added, with contributions from additional authors. Naturally, the illustrations are in full color throughout, and the book is backed by a complimentary website. The resulting textbook caters to the needs of an increasing number of students in biomedical research, cell and molecular biology, microbiology and biotechnology who end up using yeast as an important tool or model organism.",
        image: "images/creative_management.jpg",
        borrowLink: "Borrow_book.php",
        buyLink: "Buy_book.php"
    }


};

// Get the book ID from URL
const params = new URLSearchParams(window.location.search);
const bookId = params.get("book") || params.get("book_id"); // Support both DB & hardcoded books

console.log("Book ID from URL:", bookId);

// Select DOM elements
const bookTitle = document.getElementById("book-title");
const bookDescription = document.getElementById("book-description");

// Ensure database book details aren't overwritten
if (!bookTitle.textContent.trim() && bookId && books[bookId]) {
    const book = books[bookId];

    bookTitle.textContent = book.title;
    bookDescription.textContent = book.description;

    console.log("Loaded hardcoded book details!");
} else {
    console.error("Book not found in database or hardcoded list!");
}
