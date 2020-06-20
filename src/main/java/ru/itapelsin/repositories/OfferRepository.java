package ru.itapelsin.repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.repository.query.Param;
import ru.itapelsin.persistence.Category;
import ru.itapelsin.persistence.Offer;

import java.util.List;
import java.util.Set;

public interface OfferRepository extends JpaRepository<Offer, Long> {

    List<Offer> findByCategory(@Param("category") Set<Category> category);
}
