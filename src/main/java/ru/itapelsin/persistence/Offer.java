package ru.itapelsin.persistence;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.*;
import java.time.Instant;
import java.util.ArrayList;
import java.util.List;

@Entity
@Getter
@Setter
@NamedQueries({
        @NamedQuery(name = Offer.FIND_BY_CATEGORY,
            query = "SELECT o FROM Offer o WHERE o.category in :category ORDER BY o.created DESC"),
        @NamedQuery(name = Offer.FIND_BY_AUTHOR,
                query = "SELECT o FROM Offer o WHERE o.author = :author ORDER BY o.created DESC"),
        @NamedQuery(name = Offer.TOP,
                query = "SELECT o FROM Offer o ORDER BY (o.likes - o.dislikes) DESC")
})
public class Offer extends AbstractEntity {

    public static final String FIND_BY_CATEGORY = "Offer.findByCategory";
    public static final String FIND_BY_AUTHOR = "Offer.findByAuthor";
    public static final String TOP = "Offer.top";

    @ManyToOne(optional = false)
    private Account author;

    @Column(nullable = false, length = 50)
    private String title;

    @Column(nullable = false)
    private String essence;

    @ManyToOne(optional = false)
    private Category category;

    @Column(nullable = false)
    private Instant created;

    @OneToMany(mappedBy = "offer")
    private final List<Comment> comments = new ArrayList<>();

    private int likes = 0;

    private int dislikes = 0;
}
